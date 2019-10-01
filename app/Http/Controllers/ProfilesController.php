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
        $user = Auth()->user();
        $profile = $user->profile();

        return view('profile.edit', compact('profile'))->with('user_type',$user->user_type);
    }

    public function update()
    {
        $user = Auth()->user();

        switch($user->user_type){
            case('student'):
                $data = request()->validate([
                    'jcu_id' => 'required',
                    'email' => ['required', 'email','string'],
                    'aboutme' => 'string',
                    'education' => '',
                    'experience' => '',
                    'certifications' => '',
                    'image' => '',
                ]);
                $user->student()->update($data);
                break;
            case('company'):
                $data = request()->validate([
                    'email' => ['required', 'email','string'],
                    'website' => 'url',
                    'aboutus' => 'string',
                    'address' => 'string',
                    'image' => '',
                ]);
                $user->company()->update($data);
                break;
            case('teacher'):
                $data = request()->validate([
                    'email' => ['required', 'email','string'],
                    'faculty' => 'string',
                    'image' => '',
                ]);
                $user->teacher()->update($data);
                break;
        }

        return redirect(route('profile.index'));
    }
}
