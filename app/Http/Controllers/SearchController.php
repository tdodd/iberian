<?php

/*
|--------------------------------------------------------------------------
| SearcgController
|--------------------------------------------------------------------------
|
| This controller handles the search queries for the application.
|
*/

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{

    /**
     * Perform a search query.
     *
     * @param Request $request
     */
    public function search(Request $request) {

        $query = '';

        // Loop through all the search criteria present in the query.
        foreach ($request->input() as $column => $value) {

            //$user = Person::where($column, '=', $request->$column);
            if ($value !== '') // Criteria is not empty.
                $query .= $value;

        } // end foreach

        dd($query);

    }

}
