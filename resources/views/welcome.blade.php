@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container pt-5 text-center">
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <h1 class="display-4">Find Jobs</h1>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card text-left">
                        <div class="card-header">
                            <h4>Terms</h4>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="Title, occupation, keyword, etc">
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="card-header">
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body">
                            <select class="custom-select" id="">
                                <option>Software Development</option>
                                <option>Data Mining</option>
                            </select>
                        </div>
                    </div>
                    <div class="card text-right">
                        <div class="card-header">
                            <h4>Location</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <select class="custom-select" id="">
                                    <option selected>Australia</option>
                                    <optgroup label="Queensland">
                                        <option>Cairns</option>
                                        <option>Townsville</option>
                                    </optgroup>
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="POST">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" placeholder="Enter search term ..." aria-label="'Search" name="searchTerm">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div id="searchResults">
            @if(! empty($users))
                @foreach($users as $user)
                    <ul>
                        <li>{{ $user->name }} : {{ $user->email }}</li>
                    </ul>
                @endforeach
            @endif
        </div>
    </div>
@endsection
