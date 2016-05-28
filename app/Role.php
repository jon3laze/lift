<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions() 
    {
    	return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(Permission $permission)
    {
    	return $this->permissions()->save($permission);
    }

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
}
