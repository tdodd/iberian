<?php

//======================================================================
// PostController
//
// Handles POST requests for the route '/person'.
//======================================================================

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Person;
use App\Source;
use DB;

class PostController extends Controller
{
    /**
     * Store a Person in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        // Validate fields for Person creation.
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

        // Add person to database and redirect to 'create' page.
        Person::create($request->all());

        // Redirect to create page.
        return redirect(route('person.create'))->with('status', 'Person added!');

    } // End store.

    /**
     * Refine results on browse page.
     *
     * @param Request $request
     * @return array
     */
    public function refine(Request $request) {

        $people = DB::table('people');

        // Columns to display in results table.
        $columns =  ['id', 'fName', 'lName', 'birthPlaceEN', 'arrivalPlaceEN'];

        // Loop through all the search criteria present in the query.
        foreach ($request->input() as $dbColumn => $value) {

            // If user has entered a value for this column.
            if ($dbColumn !== 'post_type' && $value !== '') {
                $people->where($dbColumn, 'LIKE', $value . '%'); // Add 'where' clauses for each of the search params.
            }

        } // end foreach

        if (!empty($people)) {
            $people = $people->get(); // Get results of the query.
        }

        return view('person.index', ['people' => $people, 'columns' => $columns]);

        return $people;

    } // End refine.

    /**
     * Perform an asynchronous search for the second person in a relationship.
     * 
     * @param  Request $request
     * @return Redirect
     */
    public function search(Request $request) {

        $name = $request->input;
        $people = array();

        // Return results after 2 characters.
        if (strlen($name) > 1) {
            $people = Person::where(
                DB::raw('concat(fName, " ", mName, " ", lName)'),
                'LIKE',
                $name . '%')
            ->orwhere('alias', 'LIKE', $name . '%')
            ->get();
        }

        if (count($people)) { // A person is found.  

            // Output for each person.
            foreach ($people as $person) {

                // Radio button for person's id.
                echo '<input type="radio" name="otherPerson" value="' . $person->id . '">';
                
                // Person's information.
                echo $person->fName . ' ' . $person->lName . ': ';
                echo 'from ' . $person->birthPlaceEN . '. ';
                echo 'Arrived in ' . $person->arrivalPlaceEN . '<br>';

            }

        } else { // No results.
            echo 'No results.';
        }

    } // End search.

    /**
     * Save modifications to a person's relationships.
     * 
     * @param  Request $request
     * @return Redirect to the person's page.
     */
    public function relations(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'relationNameEN' => 'string|required|max:100',
            'relationNameESP' => 'string|required|max:100',
            'otherPerson' => 'string|required',
        ]);

        // The person whose relations are being updated.
        $person = Person::find($request->person_id);

        // Get Relation params.
        $relationNameEN = $request->relationNameEN;  
        $relationNameESP = $request->relationNameESP;  
        $otherPerson = $request->otherPerson;

        // Create the new Relation.
        $person->relations()->attach($otherPerson, [
            'relationNameEN' => $relationNameEN,
            'relationNameESP' => $relationNameESP
        ]);

        // Redirect to person's edit page.
        return redirect(route('person.edit', $request->person_id))->with('status', 'Relationship added.');

    } // End relations.

    /**
     * Save modifications to a person's sources.
     *
     * @param Request $request
     * @param $id
     */
    public function addSource(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'sourceNameEN' => 'string|required|max:100',
            'sourceNotesEN' => 'string',
            'sourceLink' => 'url|max:500'
        ]);

        // The person whose sources are being updated.
        $person = Person::find($request->person_id);

        // Create new source from input.
        $newSource = new Source();
        $newSource->nameEN = $request->sourceNameEN;
        $newSource->notesEN = $request->sourceNotesEN;
        $newSource->link = $request->sourceLink;
        $newSource->save();

        // Link new source with this person.
        $person->sources()->attach($newSource->id);

        // Redirect to person's edit page.
        return redirect(route('person.edit', $request->person_id))->with('status', 'Source added.');

    } // End sources.

    /**
     * Edit a relation Name.
     */
    public function editRelation(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'relationNameEN' => 'string|required|max:100',
            'relationNameESP' => 'string|required|max:100',
        ]);

        // Update relation information.
        DB::table('relations')->where('id', $request->relationID)->update([
            'relationNameEN' => $request->relationNameEN,
            'relationNameESp' => $request->relationNameESP
        ]);
        
        return back()->with('status', 'Relation names updated.');

    } // End editRelation

    /**
     * Edit a Source's details.
     */
    public function editSource(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'sourceNameEN' => 'string|required|max:100',
            'sourceNotesEN' => 'string',
            'sourceLink' => 'url|max:500'
        ]);

        // Update source information in the DB.
        DB::table('sources')->where('id', $request->sourceID)->update([
            'nameEN' => $request->sourceNameEN,
            'notesEN' => $request->sourceNotesEN,
            'link' => $request->sourceLink
        ]);

        // Redirect to person's edit page.
        return back()->with('status', 'Source updated.');

    } // End editRelation

} // End PostController