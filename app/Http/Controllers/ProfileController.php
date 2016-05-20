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
}
