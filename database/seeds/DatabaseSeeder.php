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
                'isAdmin' => 1
            ],
            [
                'id' => 2,
                'name' => 'sensei mark',
                'email' => 'asd1@asd.com',
                'password' => bcrypt('asd'),
                'isAdmin' => 1
            ],
            [
                'id' => 3,
                'name' => 'sensei stu',
                'email' => 'asd2@asd.com',
                'password' => bcrypt('asd'),
                'isAdmin' => 1
            ]
        ]);

        DB::table('dojos')->insert([
            [
                'name' => 'Cocksmoors Woods',
                'url' => 'http://www.cocksmoorsaikido.co.uk/',
                'info' => json_encode([
                    'address' => 'Cocksmoor Woods Leisure Centre, Alcester Rd South, Birmingham, West Midlands B14 6ER',
                    'shortDescription' => 'Short description for CMW... mus tristique eleifend lorem, nec pulvinar lacus lobortis non. Duis id justo tellus. Donec ultrices enim sit amet libero tempus, vel fringilla urna fringilla. Nulla a quam',
                    'classes' => 'Wed, Thur',
                    'info' => 'test',
                    'timetable' => [
                        [
                            'day' => 'Wednesday',
                            'times' => [
                                [
                                    'time' => '19:30 - 20:30',
                                    'age' => 'Juniors',
                                    'class' => 'General Aikido'
                                ],
                                [
                                    'time' => '19:30 - 20:30',
                                    'age' => 'Adults',
                                    'class' => 'General Aikido'
                                ]
                            ]
                        ],
                        [
                            'day' => 'Thursday',
                            'times' => [
                                [
                                    'time' => '19:15 - 20:30',
                                    'age' => 'Adults',
                                    'class' => 'General Aikido'
                                ]
                            ]
                        ]
                    ]
                ]),
                'teacher_id' => 2,
                'latitude' => 52.417414,
                'longitude' => -1.888410
            ],
            [
                'name' => 'Tudor Grange',
                'url' => 'http://www.tudorgrangeaikido.co.uk/Pages/default.aspx',
                'info' => json_encode([
                    'address' => 'Tudor Grange Sports Centre, Tudor Grange Park, Blossomfield Road, Solihull, Birmingham B91 1NB',
                    'shortDescription' => 'Short description for Tudor Grange... Sed interdum fringilla iaculis. Suspendisse commodo eros id risus iaculis, sed fermentum purus consequat. Duis sit amet elementum nunc. Pellentesque sed mi dui. Morbi tincidunt accumsan augue, n',
                    'classes' => 'Mon',
                    'info' => 'test',
                    'timetable' => [
                        [
                            'day' => 'Monday',
                            'times' => [
                                [
                                    'time' => '19:15 - 20:30',
                                    'age' => 'Adults',
                                    'class' => 'General Aikido'
                                ]
                            ]
                        ]
                    ]
                ]),
                'teacher_id' => 3,
                'latitude' => 52.412555,
                'longitude' => -1.7899997
            ]
        ]);
    }
}
