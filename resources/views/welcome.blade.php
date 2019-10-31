@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="text-center">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h1>Find Jobs</h1>
                        </div>
                        <form action="{{ route('search') }}" method="POST">
                            @csrf
                            <div class="card-group">
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h5>Terms</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="search" name="search_term" class="form-control" placeholder="Title, occupation, keyword, etc">
                                    </div>
                                </div>
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h5>Categories</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="custom-select" name="category_id">
                                            <option value="0">All</option>
                                            @foreach (\App\JobCategory::all() as $category)
                                                <option value="{{ $category->id }}">{{ htmlspecialchars($category->title) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h5>Location</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="input-group">
                                            <select class="custom-select" name="location">
                                                <option selected>Australia</option>
                                                <optgroup label="Queensland">
                                                    <option>Cairns</option>
                                                    <option>Townsville</option>
                                                </optgroup>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-outline-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center">

                    <div class="card mb-4">
                        <div class="card-header">
                            <h1>Featured</h1>
                        </div>
                        <ul class="nav nav-tabs px-1 py-3  bg-light flex-column flex-lg-row justify-content-md-center text-center">
                            <li class="nav-item">
                                <a class="active nav-link" href="" data-toggle="tab" data-target="#tabone">
                                    <i class="now-ui-icons objects_umbrella-13 mr-1"></i>Jobs</a>
                            </li>
                            <li class="nav-item ">
                                <a href="" class="nav-link" data-toggle="tab" data-target="#tabtwo">
                                    <i class="now-ui-icons shopping_cart-simple mr-1"></i>Company</a>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="tab-content mt-2">
                                <div class="tab-pane fade show active text-center" id="tabone" role="tabpanel">
                                    @foreach($jobfeatured as $job)
                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <h4>
                                                    <a class="no-style" href="/job/{{ $job->id }}">
                                                        {{ $job->title }}
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
                                                    <p>{{ $job->industry }}</p>
                                                    <p>${{ $job->salary }} / year</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade text-center" id="tabtwo" role="tabpanel">
                                    @foreach($companyfeatured as $company)
                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <h4>
                                                    <a class="no-style" href="/profile/{{$company->user_id}}">
                                                        {{ $company->name }}
                                                    </a>

                                                </h4>
                                            </div>
                                            <div class="card-subtitle">
                                            </div>
                                            <div class="card-body">
                                                <div class="card-text">
                                                    {{ $company->aboutus }}
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="d-flex-company justify-content-between align-items-baseline font-weight-bold">
                                                    <div class="email-card-header">
                                                        <p>Email</p>
                                                        <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                                                    </div>
                                                    <div class="card-footer-split-container">
                                                        <div class="card-footer-split-one">
                                                            <p>Website</p>
                                                            <a href="{{$company->website ?? 'https://website.com'}}">{{ $company->website ?? 'https://website.com'}}</a>
                                                        </div>
                                                        <div class="card-footer-split-two">
                                                            <p>Address</p>
                                                            <a href="https://maps.google.com/?q={{ $company->address ?? 'James Cook University Australia, Cairns, Smithfield Campus'}}">
                                                                {{ $company->address ?? '14-88 McGregor Road, Smithfield, Cairns, QLD 4878'}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
