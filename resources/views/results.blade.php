@extends('layouts.app')

@section('content')

    <div id="searchResults">
        @if(! empty($results))
            @foreach($results as $result)
                <div class="card">
                    <div class="card-header">

                    </div>
                </div>
    </div>


@endsection
