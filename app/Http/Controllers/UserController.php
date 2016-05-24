<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\Photo;
use App\User;

class UserController extends Controller
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
        $users = User::orderBy('name', 'ASC')->paginate(20);
        return view('user.index')
        ->with('modules', $modules)
        ->with('users', $users);
    }
}
