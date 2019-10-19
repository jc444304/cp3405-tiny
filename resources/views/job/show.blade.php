@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <div class="row">
            <div class="col-12 pt-4 ">
                <h1>{{ $job->title }}</h1>
                <div class="d-flex justify-content-between align-items-baseline">
                    <p>{{ $job->type }}</p>
                    <p>{{ $job->location }}</p>
                    <p>{{ $job->industry }}</p>
                </div>
                <hr>
                <h2>Description</h2>
                <p>{{ $job->description }}</p>
            </div>
        </div>
    </div>
@endsection
