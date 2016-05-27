<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\User;
use Auth;

class ProfileController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show single user profile
     *
     * @return $user
     */
    public function index() 
    {
        $user = User::find(Auth::id());
        return view('profile.index')
        ->with('user', $user);
    }

    /**
     * Edit single user profile
     *
     * @return $user, $roles
     */
    public function edit()
    {
        $user = User::find(Auth::id());
        return view('profile.edit')
        ->with('user', $user);
    }

     /**
     * Update single user profile
     *
     * @return $user
     */
     public function update(Request $request)
    {
        $user = User::find(Auth::id());

        if($request->hasFile('photo')) {
            $user->photos()->save($user->savePhoto($request->file('photo'), $user->id));
        }
        if($request->name !== $user->name) {
            $user->update(['name' => $request->name]);
        }
        if($request->email !== $user->email) {
            $user->update(['email' => $request->email]);
        }
        if($request->password !== '') {
            if($request->password == $request->password_confirmation) {
                $user->update(['password' => bcrypt($request->password)]);
            }    
        }

        return view('user.show')
        ->with('user', $user);   
    }
}
