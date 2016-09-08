<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $users = [
            [
                'first_name' => 'Enrique',
                'last_name'  => 'La Cruz',
                'email'      => 'elacruz@mgideas.net',
                'password'   => '123456',
                'phone'      => '(+58)412-5152243',
                'verified'   => true
            ]
        ];

        foreach ($users as $user) {
            App\User::create($user);
        }

    }
}