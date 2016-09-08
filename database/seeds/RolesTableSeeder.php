<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $roles = [
            [
                'name'         => 'admin',
                'display_name' => 'Administrador',
                'description'  => $faker->paragraph()
            ],
            [
                'name'         => 'personnel',
                'display_name' => 'Personal del preescolar',
                'description'  => $faker->paragraph()
            ],
            [
                'name'         => 'parent',
                'display_name' => 'Padre o representante',
                'description'  => $faker->paragraph()
            ]
        ];

        foreach ($roles as $role) {
            App\Role::create($role);
        }
    }
}