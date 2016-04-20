<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tetrimino;
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
        $tetriminos = Tetrimino::all();
        return view('dashboard')->with('tetriminos', $tetriminos);
    }

    public function tetrimino($name) 
    {  
    	$tetriminos = Tetrimino::all();

    	if(Tetrimino::where('name', $name)->first()) {
    		if(view()->exists($name)) {
    			return view($name)->with('tetriminos', $tetriminos);
	    	} elseif(view()->exists($name.'.index')) {
	    		return view($name.'.index')->with('tetriminos', $tetriminos);
	    	} elseif(view()->exists('modules.'.$name.'.index')) {
	    		return view('modules.'.$name.'.index')->with('tetriminos', $tetriminos);
	    	}
    	} elseif(in_array($name, ['profile', 'settings'])) {
    		return view($name)->with('tetriminos', $tetriminos);
    	}
        return view('errors.404')->with('tetriminos', $tetriminos);
    }

    public function profile() 
    {
    	$tetriminos = Tetrimino::all();
        return view('profile')->with('tetriminos', $tetriminos);
    }

    public function settings()
    {
    	$users = User::all();
    	$tetriminos = Tetrimino::all();
    	return view('settings')->with('tetriminos', $tetriminos)->with('users', $users);
    }
}
