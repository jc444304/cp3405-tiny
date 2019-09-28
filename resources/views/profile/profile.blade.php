@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <div class="row">
            <div class="col-3 p-5">
                <img src="/images/profile.jpeg"
                     style="height: 150px; box-shadow: 1px 4px 5px grey; border: 4px solid white;"
                     class="rounded-circle mx-auto d-block">
                <div class="text-center p-2"> {{ $user->user_type }}</div>
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1><h1>{{ $user->name }}</h1></h1>
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                </div>
                <div class="pt-4 font-weight-bold"> {{ $user->profile->title ?? 'Cool Title'}}</div>
                <div>
                    <div class="pt-2"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </div>
                    <div class="pt-2"><a href={{ $user->profile->url ?? 'https://www.website.com'}}>{{
                            $user->profile->url ?? 'https://www.website.com'}}</a></div>
                    <div class="pt-2">{{ $user->profile->description ?? 'Description'}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
