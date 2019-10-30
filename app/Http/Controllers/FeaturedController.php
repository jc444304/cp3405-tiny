<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FeaturedController extends Controller
{
    public function index(){
        $jobfeatured = DB::table('jobs')->latest()->take(3)->get();
        $companyfeatured = DB::table('companies')->latest()->take(3)->get();
        return view('welcome', compact('jobfeatured', 'companyfeatured'));
    }
}
