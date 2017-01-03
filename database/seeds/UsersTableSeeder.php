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
            'name' => 'Chu Kim Thang',
            'email'  => 'chukimthang94@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyen Manh Quang',
            'email'  => 'quang@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => 0
        ]);

        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email'  => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'is_admin' => 0
            ]);
        }
    }
}
