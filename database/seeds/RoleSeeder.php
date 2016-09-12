<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            ['title' => 'programmer'],
            ['title' => 'super admin'],
            ['title' => 'admin'],
            ['title' => 'author'],
            ['title' => 'user']
        ]);
    }
}
