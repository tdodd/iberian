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
use Illuminate\Database\Schema\Blueprint;

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enterPerson(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'fName' => 'alpha_dash|max:50', // Alpha-numeric characters, as well as dashes and underscores.
            'mName' => 'alpha_dash|max:50',
            'lName' => 'alpha_dash|max:50',
            'DoB' => 'date', // Date format (yyyy-mm-dd)
            'DoD' => 'date',
            'birthCity' => 'string|max:100', // Content must be a string
            'birthCountry' => 'string|required|exists:countries,name|max:100',
            'arrivalCity' => 'string|required|max:100',
            'arrivalCountry' => 'string|required|max:100',
            'arrivalDate' => 'date',
            'profession' => 'string|max:100',
            'notes' => 'string|max:2000',
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

        // Redirect to dashboard with confirmation.
        return redirect('home')->with('status', 'Person added!');

    } // end enterPerson

    /**
     * Browse people through the admin dashboard.
     */
    public function browse() {

        $people = Person::all(); // Retrieve all rows from the table.
        $columns = $people[0]->getTableColumns(); // Get column names.

        // Redirect to browse view.
        return view('browse', [
            'people' => $people,
            'columns' => $columns
        ]);

    } // end browse

} // End HomeController
