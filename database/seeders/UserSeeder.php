<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // [
            //     'name' => 'A',
            //     'email' => 'user1@gmail.com',
            //     'password' => Hash::make('123456'),
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now()
            // ],
            // [
            //     'name' => 'B',
            //     'email' => 'user2@gmail.com',
            //     'password' => Hash::make('123456'),
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now()
            // ],
            // [
            //     'name' => 'C',
            //     'email' => 'user3@gmail.com',
            //     'password' => Hash::make('123456'),
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now()
            // ],
            [
                'name' => 'staff1',
                'email' => 'user' . Str::random(8) . '3@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'staff2',
                'email' => 'user' . Str::random(8) . '3@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'staff3',
                'email' => 'user' . Str::random(8) . '3@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'staff4',
                'email' => 'user' . Str::random(8) . '3@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'staff5',
                'email' => 'user' . Str::random(8) . '3@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
