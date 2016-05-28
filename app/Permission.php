<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles()
    {
    	return $this->belongsToMany(Role::class);
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
