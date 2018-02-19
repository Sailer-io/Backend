<?php

use Illuminate\Database\Seeder;

class ContainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f=Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            \App\Container::create([
                'hostname' => $f->domainName,
                'node_id' => \App\Node\Node::first()->id
            ]);
        }
    }
}
