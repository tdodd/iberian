<?php

/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
|
| This controller handles routes for the dashboard and adds 'Person' entries to the DB.
| All routes that pass through this controller are protected by the 'auth' middleware.
|
*/

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Person;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index() {
        return view('home');
    }

    /**
     * Enters a Person into the database.
     *
     * @param Request $request, the http request
     * @return View, the dashboard view.
     */
    public function enterPerson(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'fName' => 'alpha_dash|max:50', // Alpha-numeric characters, as well as dashes and underscores.
            'mName' => 'alpha_dash|max:50',
            'lName' => 'alpha_dash|max:50',
            'DoB' => 'date', // Date format (yyyy-mm-dd)
            'DoD' => 'date',
            'birthCity' => 'alpha|max:100', // Letters only.
            'birthCountry' => 'alpha|max:100',
            'arrivalCity' => 'alpha|required|max:100',
            'arrivalCountry' => 'alpha|required|max:100',
            'arrivalDate' => 'date',
            'profession' => 'alpha_num|max:100', // Letters and numbers only.
            'notes' => 'max:2000',
        ]);

        // After validation, create a person and store them in the DB.
        Person::create([
            'fName' => $request->fName,
            'mName' => $request->mName,
            'lName' => $request->lName,
            'DoB' => $request->DoB,
            'DoD' => $request->DoD,
            'birthCity' => $request->birthCity,
            'birthCountry' => $request->birthCountry,
            'arrivalCity' => $request->arrivalCity,
            'arrivalCountry' => $request->arrivalCountry,
            'arrivalDate' => $request->arrivalDate,
            'profession' => $request->profession,
            'notes' => $request->notes
        ]);

        return view('home'); // Redirect to dashboard.

    } // end enterPerson

} // End HomeController
