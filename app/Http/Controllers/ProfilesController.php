<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        $profile = $user->profile()->get()[0];
        return view('profile.show', compact('profile'))->with('user_type',$user->user_type);
    }

    public function edit()
    {
        $user = Auth()->user();
        $profile = $user->profile()->get()[0];

        return view('profile.edit', compact('profile'))->with('user_type',$user->user_type);
    }

    public function update()
    {
        $user = Auth()->user();

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

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
                $user->student()->update(array_merge(
                    $data,
                    $imageArray ?? []
                ));
                break;
            case('company'):
                $data = request()->validate([
                    'email' => ['required', 'email','string'],
                    'website' => 'url',
                    'aboutus' => 'string',
                    'address' => 'string',
                    'image' => '',
                ]);
                $user->company()->update(array_merge(
                    $data,
                    $imageArray ?? []
                ));
                break;
            case('teacher'):
                $data = request()->validate([
                    'email' => ['required', 'email','string'],
                    'faculty' => 'string',
                    'image' => '',
                ]);
                $user->teacher()->update(array_merge(
                    $data,
                    $imageArray ?? []
                ));
                break;
        }

        return redirect(route('profile.index'));
    }
}
