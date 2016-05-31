<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'label',
    ];
    
    /**
     * Get the role that owns the permission.
     */
    public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }

    /**
     * Get the module that owns the permission.
     */
    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    /**
     * Get search results for permissions
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
}
