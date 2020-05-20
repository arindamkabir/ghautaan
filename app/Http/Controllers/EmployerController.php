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
        $applicants = DB::table('jobs')
        ->join('users', 'jobs.free_id', '=', 'users.id')
        ->where('users.id', \Auth::user()->id)
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
}
