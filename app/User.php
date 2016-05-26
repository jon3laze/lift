<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Photo;

class User extends Authenticatable
{
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['photo'];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
