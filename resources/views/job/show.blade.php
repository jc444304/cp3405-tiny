@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <div class="row p-5">
            <div class="col-12 pt-4">
                <h1>{{ $job->title }}</h1>
                <div class="d-flex justify-content-between align-items-baseline">
                    <p>{{ $job->type }}</p>
                    <p>{{ $job->location }}</p>
                    <p>{{ $job->industry }}</p>
                    <p>${{ $job->salary }} / year</p>
                </div>
                <hr>
                <h2>Description</h2>
                <p>{{ $job->description }}</p>

            @if($user_type == 'student')
                <div class="col-12 pt-5">
                    <a href="{{route('profile.index')}}" class="btn btn-success w-100">Apply Now!</a>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection
