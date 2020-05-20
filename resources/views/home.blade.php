@extends('layouts.app')

@section('content')
<div class="container">
        
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Search</button>
            </div>
        </div>

        <div class="search-filters">
            <form class="form-inline justify-content-center">
                <label class="" for="budget">Budget: </label>
                <input type="text" class="form-control ml-2 mb-2 mr-sm-2" id="budget" placeholder="" name="budget" style="width: 80px;">

                
                <label class="ml-2" for="location">Location: </label>
                <input type="text" class="form-control ml-2 mb-2 mr-sm-2" id="location" placeholder="" name="location">


                <label class="ml-2" for="type">Job Type: </label>
                <select class="form-control ml-2 mb-2 mr-sm-2 custom-select" id="type" name="type">
                    <option selected>Choose...</option>
                    <option value="1">Photographer</option>
                    <option value="2">Make-up Artist</option>
                </select>

                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-9">
                <h4 class="mt-5 mb-4">Jobs Available: </h4>

                <div class="card mb-3">
                <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="card">
                <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
