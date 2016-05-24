<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\Permission;
use App\Role;
use App\Photo;
use App\User;
use Image;
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
        $photo = Photo::where([
            ['user_id', '=', $user->id], 
            ['active', '1']
        ])->get();
        $role = $user->roles()->get()[0];
        return view('profile.index')
        ->with('modules', $modules)
        ->with('user', $user)
        ->with('photo', $photo)
        ->with('role', $role);
    }

    public function show() 
    {
    	$modules = Module::all();
        $user = User::find(Auth::id());
        $photo = Photo::where([
            ['user_id', '=', $user->id], 
            ['active', '1']
        ])->get();
        $role = $user->roles()->get()[0];
        return view('profile.index')
        ->with('modules', $modules)
        ->with('user', $user)
        ->with('photo', $photo)
        ->with('role', $role);
    }

    public function edit()
    {
    	$modules = Module::all();
        $user = User::find(Auth::id());
        $photos = Photo::where([
            ['user_id', '=', $user->id]
        ])->get();
        $role = $user->roles()->get()[0];
        return view('profile.edit')
        ->with('modules', $modules)
        ->with('user', $user)
        ->with('photos', $photos)
        ->with('role', $role);;
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $directory = public_path().'/uploads/'.$user->id;
        $full_name = '/u'.$user->id.date('m-d-Y_hia').'.jpg';
        $thumb_name = '/u'.$user->id.date('m-d-Y_hia').'_thumbnail.jpg';
        if(!is_dir($directory)) {
            File::makeDirectory($directory, 0755, true, false);
        }
        if($request->hasFile('photo')) {
            $image = Image::make(
                $request
                ->file('photo')
                ->getRealPath()
            )
            ->resize(150, null, function($constraint) {
                $constraint->aspectRatio();
            })
            ->save($directory.$full_name);
            $thumbnail = Image::make($image)
            ->resize(50, null, function($constraint) {
                $constraint->aspectRatio();
            })
            ->save($directory.$thumb_name);

            $photos = Photo::where('user_id', '=', $user->id);
            if($photos) {
                $photos->update(['active' => false]);
            }

            $photo = new Photo;
            $photo->user_id = $user->id;
            $photo->full_path = '/uploads/'.$user->id.$full_name;
            $photo->thumb_path = '/uploads/'.$user->id.$thumb_name;
            $photo->active = true;
            $photo->save();
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
    	$modules = Module::all();
        $user = User::find(Auth::id());
        $photo = Photo::where([
            ['user_id', '=', $user->id], 
            ['active', '1']
        ])->get();
        $role = $user->roles()->get()[0];
        return view('profile.index')
        ->with('modules', $modules)
        ->with('user', $user)
        ->with('photo', $photo)
        ->with('role', $role);
    }
}
