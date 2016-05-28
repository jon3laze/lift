<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Photo;
use Image;

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

    /**
     * Private function to process photo
     *
     * @return $photo
     */
    public function savePhoto($request, $id)
    {
        $directory = public_path().'/uploads/'.$id;
        $full_name = '/u'.$id.date('m-d-Y_hia').'.jpg';
        $thumb_name = '/u'.$id.date('m-d-Y_hia').'_thumbnail.jpg';

        if(!is_dir($directory)) {
            File::makeDirectory($directory, 0755, true, false);
        }

        $image = Image::make($request)
            ->resize(150, null, function($constraint) {
                $constraint->aspectRatio();
            })
            ->save($directory.$full_name);

        $thumbnail = Image::make($request)
            ->resize(50, null, function($constraint) {
                $constraint->aspectRatio();
            })
            ->save($directory.$thumb_name);

        $photos = Photo::where('user_id', '=', $id);
        if($photos) {
            $photos->update(['active' => false]);
        }

        $photo = new Photo;
        $photo->user_id = $id;
        $photo->full_path = '/uploads/'.$id.$full_name;
        $photo->thumb_path = '/uploads/'.$id.$thumb_name;
        $photo->active = true;

        return $photo;
    }

    public function scopeSearchByKeyword($query, $keyword) 
    {
        if($keyword !== '') {
            $query->where(function($query) use ($keyword) {
                $query->where('name', 'like' , "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%");
            });
        }
        return $query;
    }
}
