<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');

    }
    public function jobs(){
        $results = DB::table('job_applications')
        ->join('jobs', 'job_applications.job_id', '=', 'jobs.job_id')
        ->join('users', 'job_applications.free_id', '=', 'users.id')
        ->where('job_status', 'ongoing')
        ->get();

        return view('admin.jobs', ['results' => $results]);

    }
}
