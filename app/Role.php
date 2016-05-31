<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'label',
    ];

    /**
     * Get the permissions that belong to the role.
     */
    public function permissions() 
    {
    	return $this->belongsToMany(Permission::class);
    }

    /**
     * Assign permission to role.
     */
    public function givePermissionTo($permission)
    {
    	return $this->permissions()->save($this->getStoredPermission($permission));
    }

    /**
     * Revoke permissions from role.
     */
    public function revokePermissionTo($permission)
    {
        return $this->permissions()->detach($this->getStoredPermission($permission));
    }

    /**
     * Get search results for roles.
     */
    public function scopeSearchByKeyword($query, $keyword) 
    {
        if($keyword !== '') {
            $query->where(function($query) use ($keyword) {
                $query->where('name', 'like' , "%$keyword%")
                    ->orWhere('label', 'like', "%$keyword%");
            });
        }
        return $query;
    }

    protected function getStoredPermission($permission)
    {
        if(is_string($permission)) {
            return app(Permission::class)->find($permission);
        }
        return $permission;
    }
}
