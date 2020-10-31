@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
    <h5 class="card-header">{{$job->job_title}}</h5>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Job Details: </h5>
                    <p class="card-text">Job Category: {{$job->job_category}}</p>
                    <p class="card-text">Job Budget: Taka {{$job->job_budget}}</p>
                    <p class="card-text">Job Date: {{$job->job_date}}</p>
                    <p class="card-text">Job Address: {{$job->job_address}}</p>
                    <p class="card-text">Job Description: {{$job->job_description}}</p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5>Job Applicants: </h5>

                    <table class="table table-striped table-responsive-md btn-table">

                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Freelancer Name</th>
                            <th>Date Applied</th>
                            <th></th>
                            </tr>
                        </thead>
                        

                        <tbody>
                            <tr>
                            <th scope="row">1</th>

                            <td>{{$applicant->f_name}} {{$applicant->l_name}}</td>
                            <td>{{$applicant->created_at}}</td>
                            <td>
                            <form action="{{route('employer.jobs.ongoing.show.profile')}}" method="POST">
                                @csrf
                                <input type="hidden" name="job_id" value="{{$job->job_id}}">
                                <input type="hidden" name="free_id" value="{{$job->free_id}}">
                                <button type="submit" class="btn btn-indigo btn-sm m-0 waves-effect">View Profile</button>
                            </form>    
                            </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="text-center">
            
                <form action="{{route('employer.jobs.mark_completed')}}" method="POST">
                    @csrf
                    <input type="hidden" name="job_id" value="{{$job->job_id}}">
                    <input type="hidden" name="free_id" value="{{$applicant->free_id}}">
                    <button type="submit" class="btn btn-success btn-lg m-0 waves-effect">Mark As Completed</button>
                </form>  
            </div>
        </div>

    </div>

</div>


@endsection