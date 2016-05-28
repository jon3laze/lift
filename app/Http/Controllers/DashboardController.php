<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\Permission;
use App\Role;
use App\User;
use Auth;


class DashboardController extends Controller
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

    

    public function settings()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(5);
        $roles = Role::orderBy('name', 'ASC')->paginate(5);
        $permissions = Permission::orderBy('name', 'ASC')->paginate(5);
    	return view('settings')
            ->with('users', $users)
            ->with('roles', $roles)
            ->with('permissions', $permissions);
    }

    public function search(Request $request)
    {
        $users = User::SearchByKeyword($request->s)->paginate(20);
        $roles = Role::SearchByKeyword($request->s)->paginate(20);
        $permissions = Permission::SearchByKeyword($request->s)->paginate(20);
        return view('settings')
            ->with('users', $users)
            ->with('roles', $roles)
            ->with('permissions', $permissions);
    }
}
