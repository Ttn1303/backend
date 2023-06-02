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
            [
                'name' => 'Anh',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nam',
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bình',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nam',
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Hà',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nữ',
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Ngân',
                'email' => 'user4@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 25,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nữ',
                'role' => 'business_staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Hằng',
                'email' => 'user5@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 28,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nữ',
                'role' => 'business_staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Thảo',
                'email' => 'user6@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 24,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nữ',
                'role' => 'business_staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nam',
                'email' => 'user7@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nam',
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Dũng',
                'email' => 'user8@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nam',
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tài',
                'email' => 'user9@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nam',
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Huy',
                'email' => 'user10@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nam',
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Quân',
                'email' => 'user11@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nam',
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Đức',
                'email' => 'user12@gmail.com',
                'password' => Hash::make('123456'),
                'age' => 35,
                'address' => 'Hà Nội',
                'phone' => '0123456789',
                'sex' => 'Nam',
                'role' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}