@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row my-5">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                
                <div class="text-center profile-picture-div">
                    <img src="https://api.adorable.io/avatars/150/abott@adorable.png" class="profile-picture" alt="..." >
                </div>
                <div class="text-center mt-1"><a href="#" class="profile-links">Change Profile Picture</a></div>
                <div class="text-center"><a href="#" class="profile-links">View Profile</a></div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <button class="btn btn-success btn-block">Post a new job</button>

            </div>
        </div>
    </div>
    <div class="col-md-9">

        @if (count($jobs_unassigned) === 0 && count($jobs_ongoing) === 0 && count($jobs_completed) === 0)

            <h2 class="text-center">Hello, {{Auth::user()->name}}. You have not posted any jobs yet.</h2>
            <a href="{{route('jobs.create')}}" class="btn btn-block btn-success text-white">Post a new job now!</a>

        @else
        <h2 class="">Hello, {{Auth::user()->name}}. Here is a list of all the jobs that you posted.</h2>



        

        <div class="nav nav-tabs " id="jobs-tab" role="tablist">
            <a class="nav-link active" id="unassigned-tab" data-toggle="tab" href="#unassigned" role="tab" aria-controls="unassigned" aria-selected="true">Unassigned</a>
            <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
            <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
        </div>

        <div class="tab-content" id="jobstabContent">
            <div class="tab-pane fade show active" id="unassigned" role="tabpanel" aria-labelledby="unassigned-tab">

                @if (count($jobs_unassigned) > 0)
                    <div class="my-4">
                        <h5 class="heading text-center mb-4">Jobs unassigned to any freelancers: </h5>
                    </div>

                    @foreach($jobs_unassigned->chunk(3) as $chunk)
                        <div class="row text-center">
                            @foreach ($chunk as $job)

                            <div class="col-md-4">
                                <div class="card">
                                <div class="card-body">
                                    <a href="#"><h4 class="card-title">Jobs Title:  {{$job->job_title}}</h4></a>
                                    <p class="card-text">Job Category: {{$job->job_category}}</p>
                                    <p class="card-text">Job Budget: Taka {{$job->job_budget}}</p>
                                    <p class="card-text">Job Date: {{$job->job_date}}</p>
                                    <p class="card-text">Job Address: {{$job->job_address}}</p>
                                    <p class="card-text">Job Description: Taka {{$job->job_description}}</p>
                                    
                                    <a href="{{route('employer.showjob', $job->job_id)}}" class="btn btn-info">View Details</a>

                                    
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">

                @if (count($jobs_pending) > 0)
                    <div class="">
                        <h2 class="heading text-center mb-4">Pending Jobs: </h2>
                    </div>

                    @foreach($jobs_pending->chunk(3) as $chunk)
                        <div class="row text-center">
                            @foreach ($chunk as $job)

                            <div class="col-md-4">
                                <div class="card">
                                <div class="card-body">
                                    <a href="#"><h4 class="card-title">Jobs Title:  {{$job->job_title}}</h4></a>
                                    <p class="card-text">Job Category: {{$job->job_category}}</p>
                                    <p class="card-text">Job Budget: Taka {{$job->job_budget}}</p>
                                    <p class="card-text">Job Date: {{$job->job_date}}</p>
                                    <p class="card-text">Job Address: {{$job->job_address}}</p>
                                    <p class="card-text">Job Description: Taka {{$job->job_description}}</p>

                                    <a href="{{route('employer.showjob', $job->job_id)}}" class="btn btn-info">View Details</a>
  
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif

            </div>
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">

                @if (count($jobs_completed) > 0)
                    <div class="">
                        <h2 class="heading text-center mb-4">Completed Jobs: </h2>
                    </div>

                    @foreach($jobs_completed->chunk(3) as $chunk)
                        <div class="row text-center">
                            @foreach ($chunk as $job)

                            <div class="col-md-4">
                                <div class="card">
                                <div class="card-body">
                                    <a href="#"><h4 class="card-title">Jobs Title:  {{$job->job_title}}</h4></a>
                                    <p class="card-text">Job Category: {{$job->job_category}}</p>
                                    <p class="card-text">Job Budget: Taka {{$job->job_budget}}</p>
                                    <p class="card-text">Job Date: {{$job->job_date}}</p>
                                    <p class="card-text">Job Address: {{$job->job_address}}</p>
                                    <p class="card-text">Job Description: Taka {{$job->job_description}}</p>

                                    <form action="#" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-block btn-danger">DELETE</button>
                                    </form>   
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif    
</div>
</div>

</div>

</div>




@endsection