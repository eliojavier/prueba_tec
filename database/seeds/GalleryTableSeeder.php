<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder {

    public function run()
    {
        $galleries = [
            [
                'name'        => 'home',
                'slug'        => 'home',
                'description' => 'Slider para el home.',
                'visibility'  => 0,
                'type'        => 'slider'
            ],
            [
                'name'        => 'banner1',
                'slug'        => 'banner1',
                'description' => 'Banner 1 para el home.',
                'visibility'  => 0,
                'type'        => 'banner'
            ],
            [
                'name'        => 'banner2',
                'slug'        => 'banner2',
                'description' => 'Banner 2 el home.',
                'visibility'  => 0,
                'type'        => 'banner'
            ],
            [
                'name'        => 'Instalaciones',
                'slug'        => 'instalaciones',
                'description' => 'From small beginnings come great thingsTlf: +58 212 - 993 14.09 / 991 59.74Ingresar           InscripciónTEC        Galería         Niveles       Familia TEC      Contacto         En el Preescolar TEC contamos con unas instalaciones altamente adecuadas para motivar y estimular a nuestros niños mientras disfrutamos de un ambiente agradable y correctamente equipado para poder ofrecer un servicio educativo de calidad.',
                'visibility'  => 0,
                'type'        => 'normal'
            ]
        ];

        foreach ($galleries as $gallery) {
            App\Gallery::create($gallery);
        }

    }
}