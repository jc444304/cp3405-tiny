<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth()->user();
        return redirect("/profile/{$user->id}");
    }

    public function show(User $user)
    {
        $profile = $user->profile();
        return view('profile.show', compact('profile'))->with('user_type',$user->user_type);
    }

    public function edit()
    {
        error_log('made it to edit function');
        $user = Auth()->user();
        $profile = $user->profile();

        return view('profile.edit', compact('profile'))->with('user_type',$user->user_type);
    }

    public function update()
    {
        $user = Auth()->user();

        $data = \request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        $user->profile()->update($data);

        return redirect("/profile/{$user->id}");
    }
}
