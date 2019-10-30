<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FeaturedController extends Controller
{
    public function index(){
        $features= DB::table('jobs')->latest()->take(3)->get();
        return view('welcome', compact('features'));
    }
}
