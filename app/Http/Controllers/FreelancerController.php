<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FreelancerController extends Controller
{
    public function home(){
        $jobs_available = DB::table('jobs')
        ->where('job_status', 'unassigned')
        ->get();

        return view('freelancer.home', ['jobs_available' => $jobs_available]);

    }

    public function showjob($id){
        $job = DB::table('jobs')->where('job_id', $id)->first();
        $applied = false;
        $app = DB::table('job_applications')
        ->where('job_id', $id)
        ->where('free_id', \Auth::user()->id)
        ->get();
        if(count($app) > 0){
            $applied = true;
        } 
        return view('freelancer.viewjob', ['job' => $job,'applied'=> $applied ]);
    }

    public function applyjob(Request $request){
        $id = $request->id;
        DB::table('jobs')
        ->where('job_id', $id)
        ->update(['job_status' => 'pending']);
        DB::table('job_applications')->insert([
            'job_id'=> $id,
            'free_id' => \Auth::user()->id,
        ]);

        return back();
    }
    public function canceljobapp(Request $request){
        $id = $request->id;
        DB::table('jobs')
        ->where('job_id', $id)
        ->update(['job_status' => 'unassigned']);
        DB::table('cancelled_applications')->insert([
            'job_id'=> $id,
            'free_id' => \Auth::user()->id,
        ]);

        return back();
    }
}
