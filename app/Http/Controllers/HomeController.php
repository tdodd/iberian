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
     */
    public function enterPerson(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'arrivalCity' => 'required',
            'body' => 'required',
        ]);
        
        Person::create([ // Create a person and add them to the DB.
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

    }

}
