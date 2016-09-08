<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    private $tables = [
        'users',
        'roles',
        'role_user',
        'galleries',
        'files'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
//        $this->call(ParentsTableSeeder::class);
        $this->call(GalleryTableSeeder::class);
        $this->call(FileTableSeeder::class);
    }

    public function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->tables as $tableName) {
            DB::table($tableName)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
