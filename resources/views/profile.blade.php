@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <div class="row">
            <div class="col-3 p-5">
                <img src="../images/profile.jpeg"
                     style="height: 150px; box-shadow: 1px 4px 5px grey; border: 4px solid white;"
                     class="rounded-circle">
            </div>
            <div class="col-9 p-5">
                <div>
                    <h1><h1>{{ $user->name }}</h1></h1>
                </div>
                <div class="pt-4 font-weight-bold"> {{ $user->profile->title ?? 'Cool Title'}}</div>
                <div>
                    <div class="pt-2"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </div>
                    <div class="pt-2"><a href=https://{{ $user->profile->url ?? 'www.website.com'}}>{{
                            $user->profile->url ?? 'www.website.com'}}</a></div>
                    <div class="pt-2">{{ $user->profile->description ?? 'Description'}}</div>
                </div>
            </div>
@endsection
