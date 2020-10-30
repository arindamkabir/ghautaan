<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployerController extends Controller
{


    public function jobcreate(){
        return view('employer.createjob');

    }

    public function showjob($id){
        $job = DB::table('jobs')->where('job_id', $id)->first();
        $applicants = DB::table('job_applications')
        ->join('users', 'job_applications.free_id', '=', 'users.id')
        ->where('job_id', $id)
        ->select('users.f_name','users.l_name', 'job_applications.free_id', 'job_applications.created_at')
        ->get();

        return view('employer.showjob', ['job' => $job, 'applicants' => $applicants]);
    }

    public function jobstore(Request $request){

        DB::table('jobs')->insert(
            [ 
                'job_title' => $request->title,
                'job_category' => $request->category,
                'job_budget' => $request->budget,
                'job_date' => $request->date,
                'job_address' => $request->address,
                'user_id' => \Auth::user()->id,
                'job_description' => $request->description,
                'job_status' => "unassigned",
                'created_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('home')
            ->with('success','Job Successfully Created');
    }

    public function showfreeprofile(Request $request){
        $job_id = $request->job_id;
        $free_id = $request->free_id;

        $job = DB::table('jobs')->where('job_id', $job_id)->first();

        return view('employer.freelancerprof', ['job' => $job, 'free_id' => $free_id]);
    }

    public function acceptapp(Request $request){
        $job_id = $request->job_id;
        $free_id = $request->free_id;

        DB::table('jobs')
        ->where('job_id', $job_id)
        ->update(['job_status' => 'ongoing', 'free_id' => $free_id]);
        return redirect()->route('home')
        ->with('success','Job Accepted!');
    }

    public function rejectapp(Request $request){
        $job_id = $request->job_id;
        $free_id = $request->free_id;
        DB::table('rejected_applications')->insert([
            'job_id'=> $job_id,
            'free_id' => $free_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('job_applications')
        ->where('job_id', $job_id)
        ->where('free_id',$free_id)
        ->delete();
        $app = DB::table('job_applications')
        ->where('job_id', $job_id)
        ->get();
        if(count($app) == 0){ 
            DB::table('jobs')
            ->where('job_id', $job_id)
            ->update(['job_status' => 'unassigned']);
        }
        return redirect()->route('home')
        ->with('danger','Job Rejected!');
    }
}
