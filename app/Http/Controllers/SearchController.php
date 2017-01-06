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
use App\Person;

class SearchController extends Controller
{
    /**
     * Perform a search query.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function advancedSearch(Request $request) {

        // Validate input.
        $this->validate($request, [
            'birth1' => 'required_with:birth2|digits:4',
            'birth2' => 'required_with:birth1|digits:4',
            'death1' => 'required_with:death2|digits:4',
            'death2' => 'required_with:death1|digits:4',
            'arrival1' => 'required_with:arrival2|digits:4',
            'arrival2' => 'required_with:arrival1|digits:4',
        ]);

        $query = DB::table('people'); // Get queryBuilder instance for the table 'people'.
        $empty = true;

        // Loop through all the search criteria present in the query.
        foreach ($request->input() as $dbColumn => $value) {

            if ($value !== '') { // User has entered a value for this column.

                // If field is date.
                if ($dbColumn == 'birth1') {
                    $query->whereBetween('birthYear', [$request->birth1, $request->birth2]);
                    $empty = false;
                }
                
                elseif ($dbColumn == 'death1') {
                    $query->whereBetween('deathYear', [$request->death1, $request->death2]);
                    $empty = false;
                }
                
                elseif ($dbColumn == 'arrival1') {
                    $query->whereBetween('arrivalYear', [$request->arrival1, $request->arrival2]);
                    $empty = false;
                }
                
                elseif ($dbColumn == 'birth2' OR $dbColumn == 'death2' or $dbColumn == 'arrival2') { /*Do nothing*/ }

                else { // Field is not a date.
                    $query->where($dbColumn, 'LIKE', '%' . $value . '%'); // Add 'where' clauses for each of the search params.
                    $empty = false;
                }                

            }

        } // end foreach

        // Get results of the query.
        $results = $query->get();

        // Redirect to search results page.
        return view('search',  [
            'results' => $results,
            'empty' => $empty
        ]);

    } // end search

    /**
     * Homepage fuzzy search.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request) {

        $query = DB::table('people'); // Get queryBuilder instance for the table 'people'.
        $empty = true;

        // Terms that will be queried.
        $fuzzySearchTerms = [
            'fName', 'mName', 'lName', 'alias', 'birthPlaceEN', 'birthPlaceESP',
            'arrivalPlaceEN', 'arrivalPlaceESP', 'professionEN', 'professionESP'
        ];

        // If query is not empty.
        if ($request->q != '') {

            $empty = false;

            // Loop through terms for matches.
            foreach ($fuzzySearchTerms as $term)
                $query->orwhere($term, 'LIKE', '%' . $request->q . '%');
            
        }

        // Get results of the query.
        $results = $query->get();

        // Redirect to search results page.
        return view('search',  [
            'results' => $results,
            'empty' => $empty
        ]);

    } // end search
    
} // End SearchController
