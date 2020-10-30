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

    public function search(Request $request){
        $searchTerm = $request->search;
        $results = DB::table('jobs')   
        ->where('job_title', 'LIKE', "%{$searchTerm}%") 
        ->orWhere('job_description', 'LIKE', "%{$searchTerm}%")
        ->orWhere('job_category', 'LIKE', "%{$searchTerm}%")
        ->orWhere('job_address', 'LIKE', "%{$searchTerm}%")  
        ->paginate(5);

        return view('freelancer.searchresults',['results' => $results, 'number_results' => $results->count()]);

    }
    public function advanced_search(Request $request){
        
        $results = DB::table('jobs') 
        ->where('job_address','LIKE', "%{$request->location}%")
        ->where('job_category','LIKE', "%{$request->category}%")
        ->where('job_budget', '>=', $request->budget)  
        ->paginate(5);



        return view('freelancer.searchresults',['results' => $results, 'number_results' => $results->count()]);

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
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return back()->with('danger','Application Successful.');
    }
    public function canceljobapp(Request $request){
        $id = $request->id;
        DB::table('cancelled_applications')->insert([
            'job_id'=> $id,
            'free_id' => \Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('job_applications')->where([
            ['job_id'=> $id],
            ['free_id' => \Auth::user()->id],
        ])->delete();
        $app = DB::table('job_applications')
        ->where('job_id', $id)
        ->get();
        if(count($app) == 0){ 
            DB::table('jobs')
            ->where('job_id', $id)
            ->update(['job_status' => 'unassigned']);
        }

        return back()->with('danger','Application Cancelled.');
    }
}
