<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;
use App\Role;

class RoleController extends Controller
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
     * Show list of roles
     *
     * @return $roles
     */
    public function index() 
    {
        $roles = Role::orderBy('name', 'ASC')->paginate(20);
        return view('role.index')
        ->with('roles', $roles);
    }

    /**
     * Show single role
     *
     * @return $role
     */
    public function show(Role $role) 
    {
        return view('role.show')
        ->with('role', $role);
    }

    /**
     * Edit single role
     *
     * @return $role, $permissions
     */
    public function edit(Role $role)
    {
    	$permissions = Permission::all();
        return view('role.edit')
        ->with('role', $role)
        ->with('permissions', $permissions);
    }

    /**
     * Update role
     *
     * @return $role
     */
     public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if($request->name !== $role->name) {
            $role->update(['name' => $request->name]);
        }
        if($request->label !== $role->label) {
            $role->update(['label' => $request->label]);
        }

        if($request->permissions) {
        	foreach($request->permissions as $permission) {
        		if($role->permissions()->where('permission_id', $permission)->get()->isEmpty())
        		{
        			$role->givePermissionTo($permission);
        		}
        	}
        	foreach($role->permissions()->whereNotIn('id', $request->permissions)->get() as $permission)
        	{
        		$role->revokePermissionTo($permission);
        	}
        } else {
        	foreach($role->permissions()->get() as $permission)
        	{
        		$role->revokePermissionTo($permission);
        	}
        }
        
        return view('role.show')
        ->with('role', $role);   
    }

    /**
     * role search
     *
     * @return $roles
     */
    public function search(Request $request)
    {
        $roles = Role::SearchByKeyword($request->r)->paginate(20);
        return view('role.index')
        ->with('roles', $roles);
    }
}
