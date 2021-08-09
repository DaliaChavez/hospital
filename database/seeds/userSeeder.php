<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre'            => 'Gerardo',
            'email'             => 'gerardo@gmail.com',
            'password'          => bcrypt('123123'),
            'level'             => 0,
            'status'            => 1,
        ]);
        DB::table('users')->insert([
            'nombre'            => 'Cristian',
            'email'             => 'cristian@gmail.com',
            'password'          => bcrypt('123123'),
            'level'             => 0,
            'status'            => 1,
        ]);
    }
}
