<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('job.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'location' => 'required',
            'industry' => 'required',
        ]);

        auth()->user()->company->jobs()->create($data);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Job $job) {
        return view('job.show', compact('job'));
    }
}
