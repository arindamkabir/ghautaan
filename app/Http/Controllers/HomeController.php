<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if ((int)\Auth::user()->user_type == 1 && \Auth::user()->isAdmin == false) {
            $jobs_available = DB::table('jobs')
            ->where('job_status', 'unassigned')
            ->paginate(5);
    
            return view('freelancer.home', ['jobs_available' => $jobs_available]);
        }
        elseif ((int)\Auth::user()->user_type == 2 && \Auth::user()->isAdmin == false) {
            $jobs_unassigned = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->where('job_status', 'unassigned')
            ->get();
            $jobs_pending = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->where('job_status', 'pending')
            ->get();
            $jobs_completed = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->where('job_status', 'completed')
            ->get();
            $all_jobs = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->get();
    
            return view('employer.home', ['all_jobs' => $all_jobs,'jobs_unassigned' => $jobs_unassigned , 'jobs_pending' => $jobs_pending, 'jobs_completed' => $jobs_completed]);       
        }
    }
}
