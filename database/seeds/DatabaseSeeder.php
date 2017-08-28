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
                'avatar' => 'https://scontent-lht6-1.xx.fbcdn.net/v/t1.0-9/20604474_1539513789439026_4513123840569631365_n.jpg?oh=b13f61c31a00991a84b5e97576c30bb6&oe=5A30E27F',
                'email' => 'me@me.com',
                'password' => bcrypt('asd'),
                'isAdmin' => 1,
                'info' => '{}'
            ],
            [
                'id' => 2,
                'name' => 'sensei mark',
                'avatar' => 'https://scontent-lht6-1.xx.fbcdn.net/v/t1.0-9/14590380_10209721667251979_5154116300470702867_n.jpg?oh=0ea007e97793fb2773d342d16ec3ead0&oe=5A2623AE',
                'email' => 'asd1@asd.com',
                'password' => bcrypt('asd'),
                'isAdmin' => 1,
                'info' => '{}'
            ],
            [
                'id' => 3,
                'name' => 'sensei stu',
                'avatar' => '',
                'email' => 'asd2@asd.com',
                'password' => bcrypt('asd'),
                'isAdmin' => 1,
                'info' => '{}'
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
