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
                'name' => 'sensei mark',
                'email' => 'asd1@asd.com',
                'password' => bcrypt('asd'),
            ],
            [
                'id' => 3,
                'name' => 'sensei stu',
                'email' => 'asd2@asd.com',
                'password' => bcrypt('asd'),
            ]
        ]);

        DB::table('dojos')->insert([
            [
                'name' => 'CMW',
                'address' => 'asdasd',
                'url' => 'http://www.cocksmoorsaikido.co.uk/',
                'info' => json_encode([
                    'info' => 'test'
                ]),
                'teacher_id' => 2,
                'latitude' => 52.417506,
                'longitude' => -1.8970728
            ],
            [
                'name' => 'todor grange',
                'address' => 'asdasd',
                'url' => 'http://www.tudorgrangeaikido.co.uk/Pages/default.aspx',
                'info' => json_encode([
                    'info' => 'test'
                ]),
                'teacher_id' => 3,
                'latitude' => 52.417506,
                'longitude' => -1.8970728
            ]
        ]);
    }
}
