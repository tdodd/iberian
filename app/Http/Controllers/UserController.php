<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct() {

        // Add middleware to protect these functions.
        $this->middleware('auth');
        $this->middleware('admin');

    }

    /**
     * Retrieve all users from the DB and redirect to 'manage' page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $users = User::all();
        return view('auth.manage', ['users' => $users]);
        
    }
    
    /**
     * Redirect to 'create' page for adding new users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {

        // Retrieve all users.
        $users = User::select('username', 'is_admin', 'id')->get();
        return view('auth.manage', ['users' => $users]);

    } // End create.

    /**
     * Add a new user to the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        // Validate user input.
        $this->validate($request, [
            'username' => 'required|unique:users|max:32',
            'password' => 'required|max:64|confirmed',
            'password_confirmation' => 'required|max:64'
        ]);

        // Create new user and add them to the database.
        $newUser = new User([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin
        ]);

        $newUser->save();
        return redirect('user/create')->with('status', 'User added!');

    } // End store.

    /**
     * Delete a user from the DB.
     */
    public function destroy($id) {

        $user = User::find($id);
        $user->delete();
        return redirect('user/create')->with('status', 'User deleted.');

    }
    
} // End UserController.
