<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReceiptDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receipt_detail')->insert([
            [
                'receipt_id' => 1,
                'accessary_id' => 1,
                'quantity' => 5,
                'import_price' => 25000,
                'total' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'receipt_id' => 2,
                'accessary_id' => 2,
                'quantity' => 5,
                'import_price' => 25000,
                'total' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'receipt_id' => 3,
                'accessary_id' => 3,
                'quantity' => 5,
                'import_price' => 25000,
                'total' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'receipt_id' => 4,
                'accessary_id' => 4,
                'quantity' => 5,
                'import_price' => 25000,
                'total' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'receipt_id' => 5,
                'accessary_id' => 5,
                'quantity' => 5,
                'import_price' => 25000,
                'total' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'receipt_id' => 6,
                'accessary_id' => 6,
                'quantity' => 5,
                'import_price' => 25000,
                'total' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
