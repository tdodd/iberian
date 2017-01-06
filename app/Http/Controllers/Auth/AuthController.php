<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     */
    protected $redirectTo = 'home';

    /**
     * Create a new authentication controller instance and set the middleware.
     */
    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Log a user in and redirect them to the dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'username' => 'required|max:32',
            'password' => 'required|max:64',
        ]);

        // Get login credentials from the request.
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        // Credentials are valid.
        if (Auth::attempt($credentials)) return redirect()->intended('home');

        // Invalid credentials.
        else return redirect('login')->with('status', 'Invalid login credentials');

    } // End login.

    /**
     *	Log a user out and redirect them to the login page.
     */
    public function logout() {

        Auth::logout();
        return redirect()->intended('home');

    } // End logout.

} // End AuthController