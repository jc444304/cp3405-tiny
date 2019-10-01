@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <div class="row">
            <div class="col-3 p-5">
                <img src="/images/profile.jpeg"
                     style="height: 150px; box-shadow: 1px 4px 5px grey; border: 4px solid white;"
                     class="rounded-circle">
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1><h1>{{ $profile->name }}</h1></h1>
                    @if($profile->user_id == Auth()->user()->id)
                        <a href="{{route('profile.edit')}}">Edit Profile</a>
                    @endif
                </div>

                @switch($user_type)
                    @case('student')
                    <div class="pt-4 font-weight-bold"> {{ $profile->jcu_id ?? 'JCU ID'}}</div>
                    <div>
                        <div class="pt-2"><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                        </div>
                        <div class="pt-2"><a href='https://www.jcu.com'>
                                https://www.jcu.com </a></div>

                        <div class="pt-2">{{ $profile->aboutme ?? 'About Me'}}</div>
                        <div class="pt-2">{{ $profile->education ?? 'Education'}}</div>
                        <div class="pt-2">{{ $profile->experience ?? 'Work Experience'}}</div>
                        <div class="pt-2">{{ $profile->certifications ?? 'Certifications'}}</div>

                    </div>
                    @break

                    @case('company')
                        <div>
                            <div class="pt-2"><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                            </div>
                            <div class="pt-2"><a href="{{$profile->website}}">
                                    {{ $profile->website }}</a></div>

                            <div class="pt-2">{{ $profile->aboutus ?? 'About Us'}}</div>
                            <div class="pt-2">{{ $profile->address ?? 'Address'}}</div>

                        </div>
                    @break

                    @case('teacher')
                        <div>
                            <div class="pt-2"><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                            </div>
                            <div class="pt-2"><a href='https://www.jcu.com'>
                                    https://www.jcu.com </a></div>
                            <div class="pt-2">{{ $profile->faculty ?? 'Faculty'}}</div>
                        </div>
                    @break

                @endswitch

            </div>
        </div>
    </div>
@endsection
