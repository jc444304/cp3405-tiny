@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <h1>Find Jobs</h1>
                        </div>
                    </div>
                </div>
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <div class="card-group">
                        <div class="card text-left">
                            <div class="card-header">
                                <h5>Terms</h5>
                            </div>
                            <div class="card-body">
                                <input type="search" name="search_term" class="form-control" placeholder="Title, occupation, keyword, etc">
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="card-header">
                                <h5>Categories</h5>
                            </div>
                            <div class="card-body">
                                <select class="custom-select" name="industry">
                                    <option>Software Development</option>
                                    <option>Data Mining</option>
                                </select>
                            </div>
                        </div>
                        <div class="card text-right">
                            <div class="card-header">
                                <h5>Location</h5>
                            </div>
                            <div class="card-body">
                                <div class="input-group">
                                    <select class="custom-select" name="location">
                                        <option selected>Australia</option>
                                        <optgroup label="Queensland">
                                            <option>Cairns</option>
                                            <option>Townsville</option>
                                        </optgroup>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="container text-center pt-5">
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <h1>Featured</h1>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="card mb-4">
                        <ul class="nav nav-tabs px-1 py-3  bg-light flex-column flex-lg-row justify-content-md-center text-center">
                            <li class="nav-item">
                                <a class="active nav-link" href="" data-toggle="tab" data-target="#tabone">
                                    <i class="now-ui-icons objects_umbrella-13 mr-1"></i>Home</a>
                            </li>
                            <li class="nav-item ">
                                <a href="" class="nav-link" data-toggle="tab" data-target="#tabtwo">
                                    <i class="now-ui-icons shopping_cart-simple mr-1"></i>Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-toggle="tab" data-target="#tabthree">
                                    <i class="now-ui-icons shopping_shop mr-1"></i>Messages</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-toggle="tab" data-target="#tabfour">
                                    <i class="now-ui-icons ui-2_settings-90 mr-1"></i>Settings</a>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="tab-content mt-2">
                                <div class="tab-pane fade show active text-center" id="tabone" role="tabpanel">
                                    <p class="">I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities.
                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                                </div>
                                <div class="tab-pane fade text-center" id="tabtwo" role="tabpanel">
                                    <p class="">I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this
                                        is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                                </div>
                                <div class="tab-pane fade text-center" id="tabthree" role="tabpanel">
                                    <p class="">I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities.
                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                                </div>
                                <div class="tab-pane fade text-center" id="tabfour" role="tabpanel">
                                    <p class="">"I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this
                                        is the level that things could be at."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
