@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <div class="row">
            <div class="col-3 p-5">
                <img alt="Profile Image" src="{{ $user->profile->profileImage() }}"
                     style="height: 150px; box-shadow: 1px 4px 5px grey; border: 4px solid white;"
                     class="rounded-circle mx-auto d-block">
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->name }}</h1>
                    @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    @endcan
                </div>
                <div class="pt-2 font-weight-bold">{{$user->user_type ?? 'No user type'}} at {{ $user->profile->title ?? 'No title'}}</div>
                <div>
                    <div class="pt-2"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </div>
                    <div class="pt-2"><a href={{ $user->profile->url ?? 'https://www.website.com'}}>{{
                            $user->profile->url ?? 'https://www.website.com'}}</a></div>
                    <div class="pt-2">{{ $user->profile->description ?? 'No description'}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
