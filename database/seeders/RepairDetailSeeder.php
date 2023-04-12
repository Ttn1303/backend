<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RepairDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('repair_detail')->insert([
            [
                'repair_id' => 1,
                'accessary_id' => 1,
                'quantity'=>2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'repair_id' => 2,
                'accessary_id' => 2,
                'quantity'=>2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'repair_id' => 3,
                'accessary_id' => 3,
                'quantity'=>2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
