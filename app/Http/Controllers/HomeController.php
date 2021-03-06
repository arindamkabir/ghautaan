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
            $jobs_all = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->get();
            $jobs_ongoing = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->where('job_status', 'ongoing')
            ->paginate(5);
            $jobs_pending = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->where('job_status', 'pending')
            ->paginate(5);
            $jobs_completed = DB::table('jobs')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->where('job_status', 'completed')
            ->get();
            // $all_jobs = DB::table('jobs')
            // ->join('users', 'jobs.user_id', '=', 'users.id')
            // ->where('users.id', \Auth::user()->id)
            // ->paginate(5);
    
            return view('employer.dashboard', ['jobs_all' => $jobs_all , 'jobs_ongoing' => $jobs_ongoing, 'jobs_pending' => $jobs_pending, 'jobs_completed' => $jobs_completed]);       
        }
    }
}
