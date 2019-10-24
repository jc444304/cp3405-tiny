@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white">
        <form action="{{route('job.update')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2 pt-5">
                    <div class="row">
                        <h1>Edit Job</h1>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label-lg">{{ __('Title') }}</label>

                        <input id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ old('title') ?? $job->title }}" required
                               autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label-lg">Description</label>

                        <textarea id="description"
                                  type="text"
                                  class="form-control @error('description') is-invalid @enderror"
                                  name="description" required
                                  autocomplete="description"
                                  autofocus>{{ old('description') ?? $job->description}}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label-lg">Type</label>

                        <input id="type"
                               type="text"
                               class="form-control @error('type') is-invalid @enderror"
                               name="type"
                               value="{{ old('type') ?? $job->type}}" required
                               autocomplete="type" autofocus>

                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-md-4 col-form-label-lg">Location</label>

                        <input id="location"
                               type="text"
                               class="form-control @error('location') is-invalid @enderror"
                               name="location"
                               value="{{ old('location') ?? $job->location}}" required
                               autocomplete="location" autofocus>

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="industry" class="col-md-4 col-form-label-lg">Industry</label>

                        <input id="industry"
                               type="text"
                               class="form-control @error('industry') is-invalid @enderror"
                               name="industry"
                               value="{{ old('industry') ?? $job->industry}}" required
                               autocomplete="industry" autofocus>

                        @error('industry')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="salary" class="col-md-4 col-form-label-lg">Salary</label>

                        <input id="salary"
                               type="number"
                               min="-8388608"
                               max="8388607"
                               class="form-control @error('salary') is-invalid @enderror"
                               name="salary"
                               value="{{ old('salary') ?? $job->salary}}" required
                               autocomplete="salary" autofocus>

                        @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row py-4 justify-content-end">
                        <button class="btn btn-primary">Update Job</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
