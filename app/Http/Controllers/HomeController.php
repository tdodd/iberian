<?php

/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
|
| This controller handles routes for the dashboard.
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

} // End HomeController
