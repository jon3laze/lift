<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\User;
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
     * @return $users
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
     * @return $user
     */
    public function show(User $user) 
    {
        return view('user.show')
        ->with('user', $user);
    }

    /**
     * Edit single user
     *
     * @return $user, $roles
     */
    public function edit(User $user)
    {
        $roles = array();
        foreach(Role::all() as $role) {
            $roles[$role->id] = $role->label;
        }
        return view('user.edit')
        ->with('user', $user)
        ->with('roles', $roles);
    }

    /**
     * Update user
     *
     * @return $user
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
        if($request->role !== $user->roles()->get()[0]->id) {
            $user->roles()->detach($user->roles()->get()[0]);
            $user->roles()->save(Role::find($request->role));
        }

        return view('user.show')
        ->with('user', $user);   
    }

    /**
     * User search
     *
     * @return $users
     */
    public function search(Request $request)
    {
        $users = User::SearchByKeyword($request->u)->paginate(20);
        return view('user.index')
        ->with('users', $users);
    }
}
