<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class LanguageController extends Controller
{
	/**
	 * Toggle the application's current language.
	 * 
	 * @param Request $request
	 */
    public function setLocale() {

		if (session('locale') == 'en') session(['locale' => 'esp']);
		else session(['locale' => 'en']);

		// Redirect to same page.
		// return back();

    }
}
