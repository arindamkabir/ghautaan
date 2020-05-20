@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
    <h5 class="card-header">{{$job->job_title}}</h5>
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <h5>Job Details: </h5>
            </div>
        </div>
        <div class="card">
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

                        <td>{{$app->name}}</td>
                        <td>@mdo</td>
                        <td>
                            <button type="button" class="btn btn-indigo btn-sm m-0 waves-effect">View Application</button>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    </div>

</div>


@endsection