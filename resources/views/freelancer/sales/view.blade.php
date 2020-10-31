@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="page-heading">Manage Sales</h2>

    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="true">Ongoing</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending Approval</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">Rejected</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
    </li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">

        <div class="tab-pane fade show active" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">


            <div class="card mt-4">

                <h5 class="card-header h5 py-4">Ongoing Jobs</h5>
                <div class="card-body">
                    <div class="row justify-content-center">

                        <div class="col">
                            @if (count($ongoing_jobs) > 0)
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
                                @foreach ($ongoing_jobs as $job)
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
        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">


            <div class="card mt-4">

                <h5 class="card-header h5 py-4">Jobs Pending Approval</h5>
                <div class="card-body">
                    <div class="row justify-content-center">

                        <div class="col">
                            @if (count($applied_jobs) > 0)
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
                                @foreach ($applied_jobs as $job)
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


        <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">


            <div class="card mt-4">

                <h5 class="card-header h5 py-4">Jobs Rejected</h5>
                <div class="card-body">
                    <div class="row justify-content-center">

                        <div class="col">
                            @if (count($rejected_apps) > 0)
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
                                @foreach ($rejected_apps as $job)
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

        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">


            <div class="card mt-4">

                <h5 class="card-header h5 py-4">Jobs Completed</h5>
                <div class="card-body">
                    <div class="row justify-content-center">

                        <div class="col">
                            @if (count($completed_jobs) > 0)
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
                                @foreach ($completed_jobs as $job)
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





    </div>
</div>
@endsection