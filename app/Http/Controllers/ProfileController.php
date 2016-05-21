<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\Permission;
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
        $this->middleware('auth');
    }

    /**
     * Show list of object
     *
     * @return $users
     */
    public function index() 
    {
    	$modules = Module::all();
        $user = User::find(Auth::id());
        $role = $user->roles()->get()[0];
        return view('profile.index')
        ->with('modules', $modules)
        ->with('user', $user)
        ->with('role', $role);
    }

    public function show() 
    {
    	$modules = Module::all();
        $user = User::find(Auth::id());
        $role = $user->roles()->get()[0];
        return view('profile.index')
        ->with('modules', $modules)
        ->with('user', $user)
        ->with('role', $role);
    }

    public function edit()
    {
    	$modules = Module::all();
        $user = User::find(Auth::id());
        $role = $user->roles()->get()[0];
        return view('profile.edit')
        ->with('modules', $modules)
        ->with('user', $user)
        ->with('role', $role);
    }

    public function update(User $user, Request $request)
    {
    	$user = User::find(Auth::id());
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
    	$modules = Module::all();
        $role = $user->roles()->get()[0];
    	return view('profile.index')
    	->with('modules', $modules)
        ->with('user', $user)
        ->with('role', $role);
    }
}
