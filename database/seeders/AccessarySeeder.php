<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AccessarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accessaries')->insert([
            [
                'accessary_group_id' => 3,
                'code' => 'LEDPANEL12W',
                'name' => 'Bộ LED panel 12W Âm, tròn',
                'unit_id' => 1,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 3,
                'code' => 'LEDPANEL24W',
                'name' => 'Bộ LED panel 24W Âm, tròn',
                'unit_id' => 1,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 7,
                'code' => 'BUGI',
                'name' => 'Bugi',
                'unit_id' => 1,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 4,
                'code' => 'BRAKEPADS',
                'name' => 'Má Phanh',
                'unit_id' => 1,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 2,
                'code' => 'LUBRICATINGOIL',
                'name' => 'Dầu Nhớt',
                'unit_id' => 1,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 5,
                'code' => 'BATTERY',
                'name' => 'Bình ắc quy',
                'unit_id' => 1,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 7,
                'code' => 'AIRFILTER',
                'name' => 'Lọc gió',
                'unit_id' => 1,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 8,
                'code' => 'BELT',
                'name' => 'Dây Curoa',
                'unit_id' => 1,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 3,
                'code' => 'ĐEN',
                'name' => 'Đèn xe máy',
                'unit_id' => 3,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'accessary_group_id' => 4,
                'code' => 'PHANH',
                'name' => 'Phanh xe máy',
                'unit_id' => 2,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'accessary_group_id' => 2,
                'code' => 'OIL',
                'name' => 'Dầu máy',
                'unit_id' => 4,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'accessary_group_id' => 3,
                'code' => 'DENPHA',
                'name' => 'Đèn pha',
                'unit_id' => 2,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'accessary_group_id' => 3,
                'code' => 'XINHAN',
                'name' => 'Đèn xi nhan',
                'unit_id' => 3,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'accessary_group_id' => 7,
                'code' => 'YEN',
                'name' => 'Yên xe máy',
                'unit_id' => 2,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'accessary_group_id' => 9,
                'code' => 'LOP',
                'name' => 'Lốp xe máy',
                'unit_id' => 2,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'accessary_group_id' => 10,
                'code' => 'SAM',
                'name' => 'Săm xe máy',
                'unit_id' => 2,
                'price' => 100000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
