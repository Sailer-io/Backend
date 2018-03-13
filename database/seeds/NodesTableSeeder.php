<?php

use Illuminate\Database\Seeder;

class NodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Node\Node::create([
            'name'    => 'Localhost',
            'ip'      => '127.0.0.1',
            'user_id' => 1,
        ]);
        \App\Node\Node::create([
            'name'    => 'Test node',
            'ip'      => '45.77.104.182',
            'user_id' => 1,
        ]);
    }
}
