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
        DB::table('accessarys')->insert([
            [
                'accessary_group_id' => 1,
                'code' => 'LEDPANEL12W',
                'name' => 'Bộ LED panel 12W Âm, tròn',
                'unit_id' => 1,
                'price' => 100000,
                'import_price' => 50000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 1,
                'code' => 'LEDPANEL24W',
                'name' => 'Bộ LED panel 24W Âm, tròn',
                'unit_id' => 1,
                'price' => 100000,
                'import_price' => 50000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 1,
                'code' => 'BUGI',
                'name' => 'Bugi',
                'unit_id' => 1,
                'price' => 100000,
                'import_price' => 50000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 1,
                'code' => 'BRAKEPADS',
                'name' => 'Má Phanh',
                'unit_id' => 1,
                'price' => 100000,
                'import_price' => 50000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 1,
                'code' => 'LUBRICATINGOIL',
                'name' => 'Dầu Nhớt',
                'unit_id' => 1,
                'price' => 100000,
                'import_price' => 50000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 1,
                'code' => 'TIRES',
                'name' => 'Săm Lốp',
                'unit_id' => 1,
                'price' => 100000,
                'import_price' => 50000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 1,
                'code' => 'AIRFILTER',
                'name' => 'Lọc gió',
                'unit_id' => 1,
                'price' => 100000,
                'import_price' => 50000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_group_id' => 1,
                'code' => 'BELT',
                'name' => 'Dây Curoa',
                'unit_id' => 1,
                'price' => 100000,
                'import_price' => 50000,
                'quantity' => 100,
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
