@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
    <h2>
       Job Search Results
    </h2>

    <div id="searchResults" class="p-5" >
        @if(!empty($jobs))
            <h3>
                Found {{$jobs->total()}} jobs!
            </h3>
            @foreach($jobs as $job)
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $job->industry }}
                    </div>
                    <div class="card-title">
                        <h4>
                        {{ $job->title }}
                        </h4>
                    </div>
                    <div class="card-subtitle">
                        <h5>
                            <a href="{{route('profile.show',\App\Company::find($job->company_id)->user_id)}}">
                        {{ \App\Company::find($job->company_id)->name }}
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            {{ $job->description }}
                        </div>
                        Salary: ${{ $job->salary }}
                    </div>
                    <div class="card-footer">
                        {{ $job->type }}
                    </div>
                </div>
            @endforeach
            {{ $jobs->links() }}
        @else
            <div class="card">
                No Jobs Found! :(
            </div>
        @endif
    </div>

    </div>

@endsection
