<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        DB::table('admins')->insert([
            'username' => 'hungdz',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('hung123123'),
            'avatar'=>'avatar.jpg',
            'level'=>1,
            'active'=>1,
            'remember_token' => str_random(10),
        ]);
    }
}
