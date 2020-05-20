@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h4 class="text-center lead">Add a new job</h4>
    <form method="POST" action="{{route('jobs.store')}}" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Job Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="The Job Title">
        </div>
        <div class="form-group">
            <label for="name">Job Category</label>
            <select class="custom-select" id="type" placeholder="Job Category" name="category">
                <option value="photographer">Photographer</option>
                <option value="makeup">Make-up Artist</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Job Budget</label>
            <input type="text" class="form-control" id="budget" name="budget" placeholder="Job Budget in Taka">
        </div>
        <div class="form-group">
            <label for="price">Date Expected</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Expected Date">
        </div>
        <div class="form-group">
            <label for="stock">Address</label>
            <input type="text" class="form-control" id="stock" name="address" placeholder="Job Address">
        </div>
        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Job Description"></textarea>
        </div>
        <button type="submit" class="btn btn-block btn-info my-3 text-white">Add Job</button>
    </form>
</div>
@endsection