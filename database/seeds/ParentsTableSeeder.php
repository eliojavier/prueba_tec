<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ParentsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            $user = App\User::Create([
                'first_name' => $faker->name,
                'last_name'  => $faker->lastName,
                'email'      => $faker->email,
                'password'   => '123456',
                'phone'      => '+(58)412-1111111',
                'children' => $faker->name
            ]);
            $user->assignRole('parent');
        }
    }
}