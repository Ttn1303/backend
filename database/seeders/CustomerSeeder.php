<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Bình',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '25',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Hoa',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '30',
                'sex' => 'Nữ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Chung',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '35',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Đạt',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '32',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Trung',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '31',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tùng',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '38',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'An',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '26',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Hà',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '30',
                'sex' => 'Nữ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Phú',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '38',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Hùng',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '24',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Ngọc',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                'age' => '27',
                'sex' => 'Nữ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}