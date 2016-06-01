<?php

use Illuminate\Database\Seeder;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photoSeeds = array(
            [
                'user_id' => 1,
                'full_path' => '/uploads/1/u1.jpg',
                'thumb_path' => '/uploads/1/u1_thumbnail.jpg',
                'active' => 1,
            ],
            [
                'user_id' => 2,
                'full_path' => '/uploads/2/u2.jpg',
                'thumb_path' => '/uploads/2/u2_thumbnail.jpg',
                'active' => 1,
            ],
            [
                'user_id' => 3,
                'full_path' => '/uploads/3/u3.jpg',
                'thumb_path' => '/uploads/3/u3_thumbnail.jpg',
                'active' => 1,
            ]
        );

        $directory = public_path().'/uploads/';

        if(!File::cleanDirectory($directory)) {
            File::makeDirectory($directory, 0755, true, false);
        }
        if(!is_dir($directory.'1')) {
            File::makeDirectory($directory.'1', 0755, true, false);
        }
        if(!is_dir($directory.'2')) {
            File::makeDirectory($directory.'2', 0755, true, false);
        }
        if(!is_dir($directory.'3')) {
            File::makeDirectory($directory.'3', 0755, true, false);
        }

        Image::make('https://randomuser.me/api/portraits/lego/1.jpg')->resize(150, null, function($constraint) {
            $constraint->aspectRatio();
        })->save($directory.'1/u1.jpg');
        Image::make('https://randomuser.me/api/portraits/lego/1.jpg')->resize(50, null, function($constraint) {
            $constraint->aspectRatio();
        })->save($directory.'1/u1_thumbnail.jpg');

        Image::make('https://randomuser.me/api/portraits/lego/2.jpg')->resize(150, null, function($constraint) {
            $constraint->aspectRatio();
        })->save($directory.'2/u2.jpg');
        Image::make('https://randomuser.me/api/portraits/lego/2.jpg')->resize(50, null, function($constraint) {
            $constraint->aspectRatio();
        })->save($directory.'2/u2_thumbnail.jpg');

        Image::make('https://randomuser.me/api/portraits/lego/3.jpg')->resize(150, null, function($constraint) {
            $constraint->aspectRatio();
        })->save($directory.'3/u3.jpg');
        Image::make('https://randomuser.me/api/portraits/lego/3.jpg')->resize(50, null, function($constraint) {
            $constraint->aspectRatio();
        })->save($directory.'3/u3_thumbnail.jpg');

        for($i=4; $i<52; $i++) {
            $full_name = '/u'.$i.date('m-d-Y_hia').'.jpg';
            $thumb_name = '/u'.$i.date('m-d-Y_hia').'_thumbnail.jpg';
            if(!is_dir($directory.$i)) {
                File::makeDirectory($directory.$i, 0755, true, false);
            }
            if($i%2) {
                $image = Image::make('https://randomuser.me/api/portraits/women/'.$i.'.jpg')->resize(150, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save($directory.$i.$full_name);
                $thumbnail = Image::make($image)->resize(50, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save($directory.$i.$thumb_name);
                array_push($photoSeeds, ['user_id' => $i, 'full_path' => '/uploads/'.$i.$full_name, 'thumb_path' => '/uploads/'.$i.$thumb_name, 'active' => 1]);
            } else {
                $image = Image::make('https://randomuser.me/api/portraits/men/'.$i.'.jpg')->resize(150, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save($directory.$i.$full_name);
                $thumbnail = Image::make($image)->resize(50, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save($directory.$i.$thumb_name);
                array_push($photoSeeds, ['user_id' => $i, 'full_path' => '/uploads/'.$i.$full_name, 'thumb_path' => '/uploads/'.$i.$thumb_name, 'active' => 1]);
            }
        }
        DB::table('photos')->truncate();
        DB::table('photos')->insert($photoSeeds);
    }
}
