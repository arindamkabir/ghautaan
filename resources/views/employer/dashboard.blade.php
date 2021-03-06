@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row my-5">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                
                <div class="text-center profile-picture-div">
                    <img src="{{ asset('images/placeholder.jpg') }}" class="profile-picture" alt="..." width="100%">
                </div>
                <div class="text-center mt-1"><a href="#" class="profile-links">Change Profile Picture</a></div>
                <div class="text-center"><a href="{{ route('profile.view', Auth::user()->username)}}" class="profile-links">View Profile</a></div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <button class="btn btn-success btn-block">Post a new job</button>

            </div>
        </div>
    </div>
    <div class="col-md-9">

        @if (count($jobs_all) === 0 && count($jobs_pending) === 0 && count($jobs_completed) === 0)

            <h2 class="text-center">Hello, {{Auth::user()->name}}. You have not posted any jobs yet.</h2>
            <a href="{{route('jobs.create')}}" class="btn btn-block btn-success text-white">Post a new job now!</a>

        @else
        <h2 class="">Hello, {{Auth::user()->name}}. Here is a list of all the jobs that you posted.</h2>



        

        <div class="nav nav-tabs justify-content-center" id="jobs-tab" role="tablist">
            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
            <a class="nav-link" id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="false">Ongoing</a>
            <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending Approval</a>
            <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
        </div>

        <div class="tab-content" id="jobstabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                <div class="card mt-4">

                    <h5 class="card-header h5 py-4">All Jobs That You Posted</h5>
                    <div class="card-body">
                        <div class="row justify-content-center">

                            <div class="col">
                                @if (count($jobs_all) > 0)
                                    <table class="table ">
                                        <thead class="thead-light">
                                            <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach ($jobs_all as $job)
                                            <tr>
                                            <td>{{$job->job_title}}</td>
                                            <td>{{$job->job_budget}}</td>
                                            <td>{{$job->job_category}}</td>
                                            <td>{{$job->job_status}}</td>
                                            <td><a href="{{route('employer.showjob', $job->job_id)}}" class="btn btn-dark btn-sm">View Details</a></td>
                                            </tr>
                                    @endforeach
                                            
                                        </tbody>
                                    </table>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            
            <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                    
                <div class="card mt-4">

                    <h5 class="card-header h5 py-4">Jobs ongoing</h5>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col">
                                @if (count($jobs_ongoing) > 0)
                                @foreach ($jobs_ongoing as $job)
                                <div class="card mb-3">
                                <p class="card-header">Title: {{$job->job_title}}</p>
                                    <div class="card-body">
                                        <p class="card-text">Job Category: {{$job->job_category}}</p>
                                        <p class="card-text">Job Budget: Taka {{$job->job_budget}}</p>
                                        <a href="{{route('employer.jobs.ongoing.show', $job->job_id)}}" class="btn btn-info">View Details</a>
                                    </div>
                                </div>
                                @endforeach
                                {{ $jobs_ongoing->links() }}
                                @else
                                <h4 class="text-center">You have no ongoing jobs.</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    
                <div class="card mt-4">

                    <h5 class="card-header h5 py-4">Jobs Pending</h5>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col">
                                @if (count($jobs_pending) > 0)
                                @foreach ($jobs_pending as $job)
                                <div class="card mb-3">
                                <p class="card-header">Title: {{$job->job_title}}</p>
                                    <div class="card-body">
                                        <p class="card-text">Job Category: {{$job->job_category}}</p>
                                        <p class="card-text">Job Budget: Taka {{$job->job_budget}}</p>
                                        <a href="{{route('employer.showjob', $job->job_id)}}" class="btn btn-info">View Details</a>
                                    </div>
                                </div>
                                @endforeach
                                {{ $jobs_pending->links() }}
                                @else
                                <h4 class="text-center">You have no jobs pending approval.</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    
                    <div class="card mt-4">
    
                        <h5 class="card-header h5 py-4">Jobs Completed</h5>
                        <div class="card-body">
                            <div class="row justify-content-center">
    
                                <div class="col">
                                    @if (count($jobs_completed) > 0)
                                    @foreach ($jobs_completed as $job)
    
                                    <div class="card mb-3">
                                    <p class="card-header">Title: {{$job->job_title}}</p>
                                        <div class="card-body">
                                            <p class="card-text">Job Category: {{$job->job_category}}</p>
                                            <p class="card-text">Job Budget: Taka {{$job->job_budget}}</p>
                                            <a href="{{route('employer.showjob', $job->job_id)}}" class="btn btn-info">View Details</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <h4 class="text-center">You have no completed jobs.</h4>
                                    @endif
    
                                </div>
    
                            </div>
                        </div>
                    </div>

                
            </div>
        </div>
    @endif    
</div>
</div>

</div>

</div>




@endsection