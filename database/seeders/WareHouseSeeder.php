<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WareHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouse')->insert([
            [
                'accessary_id' => 1,
                'import' => 50,
                'export' => 25,
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_id' => 2,
                'import' => 50,
                'export' => 25,
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_id' => 3,
                'import' => 50,
                'export' => 25,
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'accessary_id' => 4,
                'import' => 50,
                'export' => 25,
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
