@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <div class="row">
            <div class="col-3 p-5">
                <img alt="Profile Image" src="{{ $profile->profileImage() }}"
                     class="rounded-circle w-auto"
                     style="height: 150px; box-shadow: 1px 4px 5px grey; border: 4px solid white;">
                <h1 class="pt-5 pb-3 font-weight-bold" style="font-size: medium">{{ $profile->name }}</h1>
                @if($user_type == 'student')
                    <p>JCU ID: <span class="font-weight-bold">{{ $profile->jcu_id ?? '10234567'}}</span></p>
                @endif
                <p><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></p>
                @if($user_type == 'company')
                    <p class="pt-2"><a
                            href="{{$profile->website ?? 'https://website.com'}}">{{ $profile->website ?? 'https://website.com'}}</a>
                    </p>
                    <p class="pt-2"><a class="no-style"
                                       href="https://maps.google.com/?q={{ $profile->address ?? 'James Cook University Australia, Cairns, Smithfield Campus'}}">{{ $profile->address ?? '14-88 McGregor Road, Smithfield, Cairns, QLD 4878'}}</a>
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

                        <h2 class="pt-4">Jobs Listed</h2>
                        <div class="row">
                            <div class="col-4">
                                <h3 style="font-size: medium; font-weight: bold">Title</h3>
                            </div>
                            <div class="col-4">
                                <h3 style="font-size: medium; font-weight: bold">Date Posted</h3>
                            </div>
                        </div>

                        @foreach($profile->jobs as $job)
                            <div class="row pt-3" @if($job->id % 2 == 0)style="background-color: #c4c4c4" @endif>
                                <div class="col-4">
                                    <a class="no-style" href="/job/{{ $job->id }}">
                                        <p>{{ $job->title }}</p>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <p>{{ $job->created_at }}</p>
                                </div>
                                @if($job->company->user_id == Auth()->user()->id)
                                    <div class="col-4">
                                        <a href="/job/{{ $job->id }}/edit/">Edit Job</a>
                                    </div>
                                @endif
                            </div>
                        @endforeach


                        <div class="pt-3 d-flex justify-content-end align-items-baseline">
                            @if($profile->user_id == Auth()->user()->id)
                                <a class="btn btn-primary" href="{{route('job.create')}}">Post New Job</a>
                            @endif
                        </div>

                    </div>
                    @break

                @endswitch
            </div>
        </div>
    </div>
@endsection
