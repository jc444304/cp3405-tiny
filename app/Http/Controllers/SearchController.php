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
    public function show(Request $request)
    {
        $searchTerm = $request->searchTerm;
        $users = DB::table('users')->where('name', $searchTerm)->select('name','email')->get();

        return view('welcome', ['users' => $users]);
    }
}
