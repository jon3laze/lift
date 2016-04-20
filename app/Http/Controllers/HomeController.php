<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tetrimino;

class HomeController extends Controller
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
        return view('home')->with('tetriminos', $tetriminos);
    }

    public function tetrimino($name) 
    {  
        if(!Tetrimino::where('name', $name)->first())
            return 'This does not exist yet'; //#TODO redirecto to error page (module does not exist)
        $tetriminos = Tetrimino::all();
        return view('home')->with('tetriminos', $tetriminos);
    }
}
