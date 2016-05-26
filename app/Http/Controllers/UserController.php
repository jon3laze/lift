<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\User;
use File;
use Auth;

class UserController extends Controller
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
     * Show list of users
     *
     * @return $modules, $users
     */
    public function index() 
    {
        $users = User::orderBy('name', 'ASC')->paginate(20);
        return view('user.index')
        ->with('users', $users);
    }

    /**
     * Show single user
     *
     * @return $modules, $user, $role
     */
    public function show(User $user) 
    {
        $role = $user->roles()->get()[0];
        return view('user.show')
        ->with('user', $user)
        ->with('role', $role);
    }

    /**
     * Edit single user
     *
     * @return $modules, $user, $role
     */
    public function edit(User $user)
    {
        $role = $user->roles()->get()[0];
        return view('user.edit')
        ->with('user', $user)
        ->with('role', $role);
    }

    /**
     * Update user
     *
     * @return $modules, $user, $role
     */
     public function update(Request $request, $id)
    {
        $user = User::find($id);

        if($request->hasFile('photo')) {
            $user->photos()->save($user->savePhoto($request->file('photo'), $id));
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
