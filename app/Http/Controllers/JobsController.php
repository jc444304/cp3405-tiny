<?php

namespace App\Http\Controllers;

use App\Job;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        if (Auth()->user()->user_type == 'company') {
            return view('job.create');
        } else {
            return redirect('/profile/' . auth()->user()->id);
        }
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'category_id' => 'required'
        ]);

        auth()->user()->company->jobs()->create($data);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Job $job)
    {
        $user = Auth()->user();
        return view('job.show', compact('job'))->with('user_type', $user->user_type);
    }

    public function edit(Job $job)
    {
        $user = Auth()->user();
        if ($user->user_type == 'company' && $job->company->user_id == $user->id) {
            return view('job.edit', compact('job'));//->with('user', $user);
        } else {
            return redirect("/profile/{$user->id}");
        }
    }

    public function update()
    {
        $user = Auth()->user();
        $job = Job::findOrFail(1);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'category_id' => 'required',
        ]);
        $job->update($data);
        $job->save();
        return redirect("/profile/{$user->id}");
    }
}
