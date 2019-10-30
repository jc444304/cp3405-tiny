@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header align-items-baseline d-flex justify-content-between"><span class="card-title">{{ $profile->name }}</span>
                <div class="edit-profile">
                    @if($profile->user_id == Auth()->user()->id)
                        <a href="{{route('profile.edit')}}">Edit Profile</a>
                    @endif
                </div>
            </div>
            <div class="row m-0">
                <div class="col-sm-3 p-5">
                    <img class="profile-image rounded-circle" alt="Profile Image" src="{{ $profile->profileImage() }}" onerror="this.src='/images/no-image-available.png';">
                    <hr>
                    @if($user_type == 'student')
                        <p>JCU ID: <span class="font-weight-bold">{{ $profile->jcu_id ?? '10234567'}}</span></p>
                        <hr>
                    @endif
                    <div class="pl-3">
                        <p class="pt-4"><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></p>

                        @if($user_type == 'company')
                            <p class="pt-2">
                                <a href="{{$profile->website ?? 'https://website.com'}}">{{ $profile->website ?? 'https://website.com'}}</a>
                            </p>

                            <p class="pt-2">
                                <a class="no-style"
                                   href="https://maps.google.com/?q={{ $profile->address ?? 'James Cook University Australia, Cairns, Smithfield Campus'}}">
                                    {{ $profile->address ?? '14-88 McGregor Road, Smithfield, Cairns, QLD 4878'}}
                                </a>
                            </p>

                        @elseif($user_type == 'teacher')
                            <p class="pt-2">Faculty: <span
                                    class="font-weight-bold">{{ $profile->faculty ?? 'Information Technology'}}</span>
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-sm-9 p-5">
                    @switch($user_type)
                        @case('student')
                        <div>
                            <h3>About Me</h3>
                            <hr>
                            <div class="pt-2">{{ $profile->aboutme ?? 'Hire me because...'}}</div>

                            <h3 class="pt-4">Education</h3>
                            <hr>
                            <div class="pt-2">{{ $profile->education ?? 'No Education'}}</div>

                            <h3 class="pt-4">Experience</h3>
                            <hr>
                            <div class="pt-2">{{ $profile->experience ?? 'No Work Experience'}}</div>

                            <h3 class="pt-4">Certifications</h3>
                            <hr>
                            <div class="pt-2">{{ $profile->certifications ?? 'No Certifications'}}</div>
                        </div>
                        @break

                        @case('company')
                        <div>
                            <h3>About</h3>
                            <hr>
                            <div class="pt-2">{{ $profile->aboutus ?? 'Apply to our jobs because...'}}</div>


                            <h3 class="pt-4">Jobs</h3>
                            <hr>
                            <div class="row m-0">
                                <div class="col-4">
                                    <h4 style="font-size: medium; font-weight: bold">Title</h4>
                                </div>
                                <div class="col-4">
                                    <h4 style="font-size: medium; font-weight: bold">Date Posted</h4>
                                </div>
                            </div>

                            @foreach($profile->jobs as $job)
                                <div class="row m-0 pt-3" @if($job->id % 2 == 0)style="background-color: #c4c4c4" @endif>
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
    </div>
@endsection
