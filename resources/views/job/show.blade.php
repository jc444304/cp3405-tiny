@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center"><span class="card-title">{{ $job->title }}</span>
            </div>
            <div class="row p-5">
                <div class="col-12 pt-4">

                    <div class="d-flex justify-content-between align-items-baseline font-weight-bold">
                        <p>{{ $job->type }}</p>
                        <p>{{ $job->location }}</p>
                        <p>{{ $job->industry }}</p>
                        <p>${{ $job->salary }} / year</p>
                    </div>
                    <hr>
                    <h3>Description</h3>
                    <p>{{ $job->description }}</p>
                    <p class="text-right">Job posted by <a href="{{route('profile.show',\App\Company::find($job->company_id)->user_id)}}">{{ \App\Company::find($job->company_id)->name }}</a></p>

                    @if($user_type == 'student')
                        <div class="col-12 pt-5">
                            <a href="{{route('profile.index')}}" class="btn btn-success w-100">Apply Now!</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
