@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="title mb-md-auto">
                    {{ config('app.name') }}
                </h1>
                <p>
                    Welcome to joblink!
                </p>
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
