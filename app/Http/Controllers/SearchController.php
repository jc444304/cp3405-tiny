<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
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


    /**
     * Search jobs in the database
     *
     * @param  string $searchterm
     * @return View
     */
    public function show()
    {
        $search_term = request('search_term');
        $industry = request('industry');
        $location = request('location');


        $jobs = DB::table('jobs')
            ->where([
                ['title','like', '%'.$search_term.'%'],
                ['industry','like', '%'.$industry.'%'],
                ['location','like', '%'.$location.'%'],
                ])
            ->orWhere([
                ['description','like', '%'.$search_term.'%'],
                ['industry','like', '%'.$industry.'%'],
                ['location','like', '%'.$location.'%'],
                ])
            ->get();


        return view('jobsearch', ['jobs' => $jobs]);
    }
}
