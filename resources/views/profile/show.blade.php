@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $profile->profileImage() }}"
                     class="rounded-circle w-auto"
                     style="height: 150px; box-shadow: 1px 4px 5px grey; border: 4px solid white;">
                <h1 class="pt-5 pb-3 font-weight-bold" style="font-size: medium">{{ $profile->name }}</h1>
                @if($user_type == 'student')
                    <p>JCU ID: <span class="font-weight-bold">{{ $profile->jcu_id ?? 'JCU ID'}}</span></p>
                @endif
                <p><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></p>
                @if($user_type == 'company')
                    <p class="pt-2"><a
                            href="https://maps.google.com/?q={{ $profile->address ?? 'James Cook University Australia, Cairns, Smithfield Campus'}}">{{ $profile->address ?? '14-88 McGregor Road, Smithfield, Cairns, QLD 4878'}}</a>
                    </p>
                    <p class="pt-2"><a
                            href="{{$profile->website ?? 'https://website.com'}}">{{ $profile->website ?? 'https://website.com'}}</a>
                    </p>
                @elseif($user_type == 'teacher')
                    <p class="pt-2">Faculty: <span
                            class="font-weight-bold">{{ $profile->faculty ?? 'Information Technology'}}</span></p>
                @endif
            </div>

            <div class="col-9 p-5">
                <div class="d-flex justify-content-end align-items-baseline">
                    @if($profile->user_id == Auth()->user()->id)
                        <a href="{{route('profile.edit')}}">Edit Profile</a>
                    @endif
                </div>

                @switch($user_type)
                    @case('student')
                    <div>
                        <h2>About Me</h2>
                        <div class="pt-2">{{ $profile->aboutme ?? 'Hire me because...'}}</div>
                        <hr>
                        <h2>Education</h2>
                        <div class="pt-2">{{ $profile->education ?? 'No Education'}}</div>
                        <hr>
                        <h2>Experience</h2>
                        <div class="pt-2">{{ $profile->experience ?? 'No Work Experience'}}</div>
                        <hr>
                        <h2>Certifications</h2>
                        <div class="pt-2">{{ $profile->certifications ?? 'No Certifications'}}</div>
                    </div>
                    @break

                    @case('company')
                    <div>
                        <h2>About Us</h2>
                        <div class="pt-2">{{ $profile->aboutus ?? 'Apply to our jobs because...'}}</div>
                        <hr>

                        <h2>Jobs Listed</h2>
                        <div class="row">
                            <div class="col-6">
                                <h3 style="font-size: medium; font-weight: bold">Title</h3>
                            </div>
                            <div class="col-6">
                                <h3 style="font-size: medium; font-weight: bold">Date Posted</h3>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($profile->jobs as $job)

                                <div class="col-6">
                                    <p><a href="/job/{{ $job->id }}">{{ $job->title }}</a></p>
                                </div>
                                <div class="col-6">
                                    <p>{{ $job->created_at }}</p>
                                </div>

                            @endforeach
                        </div>
                        <div class="d-flex justify-content-end align-items-baseline">
                            @if($profile->user_id == Auth()->user()->id)
                                <a href="{{route('job.create')}}">Post New Job</a>
                            @endif
                        </div>

                    </div>
                    @break

                @endswitch
            </div>
        </div>
    </div>
@endsection
