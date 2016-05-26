<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\Permission;
use App\Role;
use App\User;
use File;
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
        $role = $user->roles()->get()[0];
        return view('profile.index')
        ->with('user', $user)
        ->with('role', $role);
    }

    /**
     * Edit single user profile
     *
     * @return $user
     */
    public function edit()
    {
        $user = User::find(Auth::id());
        $role = $user->roles()->get()[0];
        return view('profile.edit')
        ->with('user', $user)
        ->with('role', $role);
    }

     /**
     * Update single user profile
     *
     * @return $modules, $user, $role
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
        $role = $user->roles()->get()[0];
        return view('user.show')
        ->with('user', $user)
        ->with('role', $role);   
    }
}
