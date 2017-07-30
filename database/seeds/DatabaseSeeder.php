<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'anna',
                'email' => 'me@me.com',
                'password' => bcrypt('asd'),
            ],
            [
                'id' => 2,
                'name' => 'sensei',
                'email' => 'me2@me.com',
                'password' => bcrypt('asd'),
            ]
        ]);

        DB::table('dojos')->insert([
            'name' => 'CMW',
            'address' => 'asdasd',
            'info' => json_encode([
                'info' => 'test'
            ]),
            'teacher_id' => 2,
            'latitude' => 52.417506,
            'longitude' => -1.8970728
        ]);
    }
}
