@extends('layouts.app')

@section('content')
    <h2>
       Job Search Results
    </h2>
    <div id="searchResults">
        @if(! empty($jobs))
            @foreach($jobs as $job)
                <div class="card">
                    <div class="card-header">
                        {{ $job->industry }}
                    </div>
                    <div class="card-title">
                        {{ $job->title }}
                    </div>
                    <div class="card-subtitle">
                        {{ $job->company->name }}
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            {{ $job->description }}
                        </div>
                        {{ $job->salary }}
                    </div>
                    <div class="card-footer">
                        {{ $job->type }}
                    </div>
                </div>
            @endforeach
        @else
            <div class="card">
                No Jobs Found! :(
            </div>
        @endif
    </div>

@endsection
