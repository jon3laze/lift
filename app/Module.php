<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	/**
     * Get the permissions that belong to the module.
     */
    public function permissions()
    {
    	return $this->hasMany('App\Permission');
    }
}
