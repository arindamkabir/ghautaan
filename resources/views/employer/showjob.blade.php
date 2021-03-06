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
        @if(count($applicants) > 0)
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
                        @foreach($applicants as $app)
                        <tr>
                        <th scope="row">1</th>

                        <td>{{$app->f_name}} {{$app->l_name}}</td>
                        <td>{{$app->created_at}}</td>
                        <td>
                        <form action="{{route('employer.show_free_prof')}}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{$job->job_id}}">
                            <input type="hidden" name="free_id" value="{{$app->free_id}}">
                            <button type="submit" class="btn btn-indigo btn-sm m-0 waves-effect">View Profile</button>
                        </form>    
                        </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        @endif
    </div>

    </div>

</div>


@endsection