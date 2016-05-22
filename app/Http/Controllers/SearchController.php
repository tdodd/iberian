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
     * @param Request $request, the http request passed to the controller.
     */
    public function search(Request $request) {

        $query = DB::table('people'); // Get queryBuilder instance for the table 'people'.

        // Loop through all the search criteria present in the query.
        foreach ($request->input() as $dbColumn => $value) {

            if ($value !== '') // User has entered a value for this column.
                $query->where($dbColumn, 'LIKE', $value); // Add 'where' clauses for each of the search params.

        } // end foreach

        $results = $query->get(); // Get results of the query.

        if ($results[0] != '') { // If rows are found.
            foreach ($results as $currentPerson) {
                echo '<p>id: ' . $currentPerson->id . ', name: ' . $currentPerson->fName . '</p>';
            }
        } else { // No rows are found.
            echo 'No results found.';
        }

    }

} // End SearchController
