<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\User;


class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('dashboard')->with('modules', $modules);
    }

    public function modules($name) 
    {  
    	$modules = Module::all();

    	if(Module::where('name', $name)->first()) {
    		if(view()->exists($name)) {
    			return view($name)->with('modules', $modules);
	    	} elseif(view()->exists($name.'.index')) {
	    		return view($name.'.index')->with('modules', $modules);
	    	} elseif(view()->exists('modules.'.$name.'.index')) {
	    		return view('modules.'.$name.'.index')->with('modules', $modules);
	    	}
    	} elseif(in_array($name, ['profile', 'settings'])) {
    		return view($name)->with('modules', $modules);
    	}
        return view('errors.404')->with('modules', $modules);
    }

    public function profile() 
    {
    	$modules = Module::all();
        return view('profile')->with('modules', $modules);
    }

    public function settings()
    {
    	$users = User::all();
    	$modules = Module::all();
    	return view('settings')->with('modules', $modules)->with('users', $users);
    }
}
