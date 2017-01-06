<?php

//======================================================================
// PersonController
//
// Resource controller for 'Person' class.
//======================================================================

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Person;
use DB;

class PersonController extends Controller
{
    /**
     * Constructor. Adds middleware to protect routes if a user is not logged in.
     */
    public function __construct() {

        // Must be logged in to view theses routes.
        $this->middleware('auth', ['only' => [
            'index',
            'create',
            'store',
            'edit',
            'update'
        ]]);

    } // End __construct.

    /**
     * View all people in the database and sort the rows by column if necessary.
     *
     * @param string $column, the column to sort by.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($column = 'id') {

        // Retrieve all rows from the table in the specified order.
        $columns =  ['id', 'fName', 'lName', 'birthPlaceEN', 'arrivalPlaceEN'];
        $people = Person::select($columns)->orderBy($column)->get();

        // Redirect to Browse page.
        return view('person.index', ['people' => $people, 'columns' => $columns]);

    } // end index.

    /**
     * Show a person and their attributes, relations and sources.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show($id) {

        if ($person = Person::find($id)) { // Get person.

            // Columns to NOT include in the 'info' table.
            $doNotInclude = ['id', 'fName', 'mName', 'lName', 'alias', 'notes'];

            // Terms that will be excluded from a language.
            $englishTerms = ['birthPlaceEN', 'arrivalPlaceEN', 'professionEN', 'birthMonthEN', 'deathMonthEN', 'arrivalMonthEN'];
            $spanishTerms = ['birthPlaceESP', 'arrivalPlaceESP', 'professionESP', 'birthMonthESP', 'deathMonthESP', 'arrivalMonthESP'];

            // Redirect to person's page with parameters.
            return view('person.show', [
                'doNotInclude' => $doNotInclude,
                'englishTerms' => $englishTerms,
                'spanishTerms' => $spanishTerms,
                'attributes' => $person->getAttributes(),
                'columns' => $person->getTableColumns(),
                'relations' => $person->relations()->get(),
                'sources' => $person->sources()->get()
            ]);

        } else { // Person not found.
            return route('person');
        }

    } // End show.

    /**
     * Redirect to the 'create' page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() { 
        return view('person.create'); 
    }

    /**
     * Redirect to a person's 'edit' page with necessary data.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {

        // Redirect if found.
        if ($person = Person::find($id)) {

            return view('person.edit', [
                'attributes' => $person->getAttributes(),
                'columns' => $person->getTableColumns(),
                'relations' => $person->relations()->get(),
                'sources' => $person->sources()->get()
            ]);

        } else { // ID not found.
            return route('person');
        }

    } // End edit.

    /**
     * Update a person's information.
     *
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id) {

        // Validate input.
        $this->validate($request, [
            'fName' => 'string|max:50',
            'mName' => 'string|max:50',
            'lName' => 'string|required|max:50',
            'alias' => 'string|max:50',
            
            'birthYear' => 'digits:4',
            'birthMonthEN' => 'string|max:15',
            'birthMonthESP' => 'string|max:15',
            'birthDay' => 'digits_between:1,2',
            
            'deathYear' => 'digits:4',
            'deathMonthEN' => 'string|max:15',
            'deathMonthESP' => 'string|max:15',
            'deathDay' => 'digits_between:1,2',
            
            'arrivalYear' => 'digits:4',
            'arrivalMonthEN' => 'string|max:15',
            'arrivalMonthESP' => 'string|max:15',
            'arrivalDay' => 'digits_between:1,2',
            
            'birthPlaceEN' => 'string|required|max:100',
            'birthPlaceESP' => 'string|required|max:100',
            'arrivalPlaceEN' => 'string|required|max:100',
            'arrivalPlaceESP' => 'string|required|max:100',
            'professionEN' => 'string|max:100',
            'professionESP' => 'string|max:100',
            'notes' => 'string|max:2000',
        ]);

        // Person being updated.
        $person = Person::find($id);

        // Loop through input.
        foreach ($person->getTableColumns() as $column) {

            if ($column != 'id') $person->$column = $request->$column;

        }        

        // Update database values.
        $person->save();

        // Redirect to person's edit page.
        return redirect(route('person.edit', $person->id))->with('status', 'Changes saved!');

    } // End update.

    /**
     * Delete a Person from the DB.
     */
    public function destroy($id) {

        $person = Person::find($id);
        $person->delete();
        return redirect(route('person.index'))->with('status', 'Person deleted.');

    } // End destroy.

    /**
     * Delete a Relation from the DB.
     */
    public function destroyRelation(Request $request) {

        DB::table('relations')->where('id', '=', $request->relationID)->delete();
        return redirect(route('person.edit', $request->person_id))->with('status', 'Relation deleted.');

    } // End destroyRelation.

    /**
     * Delete a Source from the DB.
     */
    public function destroySource(Request $request) {
        
        DB::table('sources')->where('id', '=', $request->sourceID)->delete();
        return redirect(route('person.edit', $request->person_id))->with('status', 'Source deleted.');

    } // End destroyRelation.

} // End PersonController.