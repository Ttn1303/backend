<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receipts')->insert([
            [
                'user_id' => 1,
                'receipt_name' => 'PN00011',
                'receipt_date' => Carbon::now(),
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'receipt_name' => 'PN00012',
                'receipt_date' => Carbon::now(),
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 3,
                'receipt_name' => 'PN00013',
                'receipt_date' => Carbon::now(),
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'receipt_name' => 'PN00014',
                'receipt_date' => Carbon::now(),
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'receipt_name' => 'PN00015',
                'receipt_date' => Carbon::now(),
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 3,
                'receipt_name' => 'PN00016',
                'receipt_date' => Carbon::now(),
                'note' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}