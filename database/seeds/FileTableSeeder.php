<?php

use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{

    public function run()
    {
        $files = [
            [
                'name'           => '1470855286-slide1.jpg    ',
                'path'           => 'uploads/images/1470855286-slide1.jpg',
                'thumbnail_path' => 'uploads/images/thumbs/tn-1470855286-slide1.jpg',
                'display_name'   => 'slide1.jpg',
                'gallery_id'     => 1,
            ],
            [
                'name'           => '1470855286-slide2.jpg',
                'path'           => 'uploads/images/1470855286-slide2.jpg',
                'thumbnail_path' => 'uploads/images/thumbs/tn-1470855286-slide2.jpg',
                'display_name'   => 'slide2.jpg',
                'gallery_id'     => 1,
            ],
            [
                'name'           => '1470855287-slide3.jpg',
                'path'           => 'uploads/images/1470855287-slide3.jpg',
                'thumbnail_path' => 'uploads/images/thumbs/tn-1470855287-slide3.jpg',
                'display_name'   => 'slide3.jpg',
                'gallery_id'     => 1,
            ],
            [
                'name'           => '1470856841-banner1.png',
                'path'           => 'uploads/images/1470856841-banner1.png',
                'thumbnail_path' => 'uploads/images/thumbs/tn-1470856841-banner1.png',
                'display_name'   => 'banner1.png',
                'gallery_id'     => 2,
            ],
            [
                'name'           => '1470856513-banner2.png',
                'path'           => 'uploads/images/1470856513-banner2.png',
                'thumbnail_path' => 'uploads/images/thumbs/tn-1470856513-banner2.png',
                'display_name'   => 'banner2.png',
                'gallery_id'     => 3,
            ]

        ];

        foreach ($files as $file) {
            App\File::create($file);
        }

    }
}