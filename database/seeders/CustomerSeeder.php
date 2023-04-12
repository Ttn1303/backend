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
                'name' => 'A',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                // 'age' => '',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'B',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                // 'age' => '',
                'sex' => 'Nữ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'C',
                'phone' => '0123456789',
                'address' => 'Hà Nội',
                // 'age' => '',
                'sex' => 'Nam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
