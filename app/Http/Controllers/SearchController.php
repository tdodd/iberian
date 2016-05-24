<?php

/*
|--------------------------------------------------------------------------
| SearchController
|--------------------------------------------------------------------------
|
| This controller handles the search queries for the application.
|
*/

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{
    /**
     * Perform a search query.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request) {

        $query = DB::table('people'); // Get queryBuilder instance for the table 'people'.
        $empty = true; // Check if query is empty.

        // Loop through all the search criteria present in the query.
        foreach ($request->input() as $dbColumn => $value) {

            if ($value !== '') { // User has entered a value for this column.
                $query->where($dbColumn, 'LIKE', $value); // Add 'where' clauses for each of the search params.
                $empty = false;
            }
        } // end foreach

        $results = $query->get(); // Get results of the query.

        // Redirect to search results page.
        return view('search',  [
            'results' => $results,
            'empty' => $empty
        ]);

    } // end search

} // End SearchController
