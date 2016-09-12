<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            ['username' => 'programmer','email' => 'programmer@gmail.com', 'password' => bcrypt('-+'), 'role_id' => 1],
            ['username' => 'sa','email' => 'sa@gmail.com', 'password' => bcrypt('-+'), 'role_id' => 2],
            ['username' => 'admin','email' => 'admin@gmail.com', 'password' => bcrypt('-+'), 'role_id' => 3],
            ['username' => 'author','email' => 'author@gmail.com', 'password' => bcrypt('-+'), 'role_id' => 4],
            ['username' => 'user','email' => 'user@gmail.com', 'password' => bcrypt('-+'), 'role_id' => 5],
        ]);
    }
}
