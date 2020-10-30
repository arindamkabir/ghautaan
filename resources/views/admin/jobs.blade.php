@extends('layouts.admin')

@section('content')
<div class="container">

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Job Title</th>
        <th scope="col">Job Category</th>
        <th scope="col">Employer ID</th>
        <th scope="col">Employer Name</th>
        <th scope="col">Employer Contact</th>
        <th scope="col">Freelancer ID</th>
        <th scope="col">Freelancer Name</th>
        <th scope="col">Freelancer Contact</th>
        <th scope="col">Freelancer Contact</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($results as $job)

      <tr>
        <th scope="row">{{$job->job_id}}</th>
        <td>{{$job->job_title}}</td>
        <td>{{$job->job_category}}</td>
        <td>{{$job->user_id}}</td>
        <td>{{$job->free_id}}</td>
        <td>{{$job->job_title}}</td>
        <td>{{$job->job_category}}</td>
        <td>{{$job->user_id}}</td>
        <td>{{$job->free_id}}</td>
        <!-- Confirm Button : confirms the job application if the requirements meet  -->
        <td>
          <form action="#" method="POST">
            @csrf
            <input type="hidden" name="id" value="">
            <button type="submit" class="btn btn-success">Confirm</button>
          </form>
        </td>
        <!-- Close Button : closes the job application if the requirements do not meet  -->
        <td>
          <form action="#" method="POST">
            @csrf
            <input type="hidden" name="id" value="">
            <button type="submit" class="btn btn-warning">Close</button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>

        



@endsection
