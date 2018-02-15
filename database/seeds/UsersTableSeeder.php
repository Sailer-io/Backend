<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'email' => 'l@l.l',
            'name' => 'Lenaic',
            'password' => bcrypt('test')
        ]);
    }
}
