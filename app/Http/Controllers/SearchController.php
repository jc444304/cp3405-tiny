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
        $location = request('location');
        $categoryId = (int)request('category_id');


        $jobs = DB::table('jobs')
            ->where([
                ['title', 'like', '%' . $search_term . '%'],
                //['location', 'like', '%' . $location . '%'],
                $categoryId === 0 ?
                    ['category_id', '>', 0] :
                    ['category_id', '=', $categoryId],
            ])
            ->orWhere([
                ['description', 'like', '%' . $search_term . '%'],
                //['location', 'like', '%' . $location . '%'],
                $categoryId === 0 ?
                    ['category_id', '>', 0] :
                    ['category_id', '=', $categoryId],
            ])
            ->paginate(3);


        if ($jobs->isEmpty()) {
            $jobs = DB::table('jobs')
                ->where([
                    ['title', 'like', '%' . $search_term . '%'],
                    ['category_id', '==', $categoryId],
                ])
                ->orWhere([
                    ['title', 'like', '%' . $search_term . '%'],
                    //['location', 'like', '%' . $location . '%'],
                ])
                ->orWhere([
                    ['description', 'like', '%' . $search_term . '%'],
                    ['category_id', '==', $categoryId],
                ])
                ->orWhere([
                    ['description', 'like', '%' . $search_term . '%'],
                    //['location', 'like', '%' . $location . '%'],
                ])
                ->paginate(3);
        }

        if ($jobs->isEmpty()) {
            $jobs = DB::table('jobs')
                ->where([
                    ['category_id', '==', $categoryId],
                ])
                ->orWhere([
                    //['location', 'like', '%' . $location . '%'],
                ])
                ->orWhere([
                    ['description', 'like', '%' . $search_term . '%'],
                ])
                ->orWhere([
                    ['title', 'like', '%' . $search_term . '%'],
                ])
                ->paginate(3);
        }


        return view('jobsearch', ['jobs' => $jobs]);
    }
}
