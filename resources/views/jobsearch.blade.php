@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header card-title">Job Search Results</div>

            <div id="searchResults" class="p-5">
                @if(!empty($jobs))
                    <h3>
                        {{$jobs->total()}} jobs found!
                    </h3>
                    @foreach($jobs as $job)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>
                                    <a class="no-style" href="/job/{{ $job->id }}">
                                        {{ $job->title }} at {{ \App\Company::find($job->company_id)->name }}
                                    </a>
                                </h4>
                            </div>
                            <div class="card-subtitle">
                                <h5>

                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    {{ $job->description }}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-baseline font-weight-bold">
                                    <p>{{ $job->type }}</p>
                                    <p>{{ $job->location }}</p>
                                    <p>{{ \App\JobCategory::find($job->category_id)->title }}</p>
                                    <p>${{ $job->salary }} / year</p>
                                </div>
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
    </div>

@endsection
