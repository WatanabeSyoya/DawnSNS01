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
        DB::table('users')->insert([
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],
            [
                'username' => str_random(6),
                'mail' => str_random(6) . '@gmail.com',
                'password' => bcrypt('secret'),
                'bio' => str_random(12),
            ],

        ]);
    }
}
