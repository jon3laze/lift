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

    public function getPhotoAttribute()
    {
        if($this->photos->count() == 0)
        {
            $photo = [
                'user_id' => $this->id,
                'full_path' => '/uploads/'.'default.jpg',
                'thumb_path' => '/uploads/'.'default_thumbnail.jpg'
            ];
        } else {
            $photo = $this->photos->where('active')->get();
        }
        return $this->photos;
    }
}
