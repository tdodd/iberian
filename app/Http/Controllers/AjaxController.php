<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Source;
use App\Person;

class AjaxController extends Controller
{
    /**
     * Delete a source from the database.
     * 
     * @param  Request $request
     */
    public function delete(Request $request) {

        // Get the source and delete it.
        $source = Source::find($request->id);
        $source->delete();

        // Redirect to same page.
        return back()->with('status','Source deleted');

    } // End delete.

} // End AjaxController