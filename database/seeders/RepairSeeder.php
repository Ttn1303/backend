<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RepairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('repairs')->insert([
            [
                'customer_id' => 1,
                'vehicle_infor_id' => 1,
                'code' => 'PSC00011',
                'state' => 1,
                'user_id' => 1,
                'receipt_date' => Carbon::now(),
                'appointment_date' => Carbon::now(),
                'total' => 500000,
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicle_condition' => '',
                'customer_request' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 2,
                'vehicle_infor_id' => 2,
                'code' => 'PSC00012',
                'state' => 2,
                'user_id' => 2,
                'receipt_date' => Carbon::now(),
                'appointment_date' => Carbon::now(),
                'total' => 500000,
                'note' => '',
                'service' => 'Sửa chữa',
                'vehicle_condition' => '',
                'customer_request' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 3,
                'vehicle_infor_id' => 3,
                'code' => 'PSC00013',
                'state' => 3,
                'user_id' => 3,
                'receipt_date' => Carbon::now(),
                'appointment_date' => Carbon::now(),
                'total' => 500000,
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicle_condition' => '',
                'customer_request' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 4,
                'vehicle_infor_id' => 4,
                'code' => 'PSC00044',
                'state' => 1,
                'user_id' => 4,
                'receipt_date' => Carbon::now(),
                'appointment_date' => Carbon::now(),
                'total' => 500000,
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicle_condition' => '',
                'customer_request' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 5,
                'vehicle_infor_id' => 5,
                'code' => 'PSC00055',
                'state' => 1,
                'user_id' => 5,
                'receipt_date' => Carbon::now(),
                'appointment_date' => Carbon::now(),
                'total' => 500000,
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicle_condition' => '',
                'customer_request' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 6,
                'vehicle_infor_id' => 6,
                'code' => 'PSC00066',
                'state' => 1,
                'user_id' => 6,
                'receipt_date' => Carbon::now(),
                'appointment_date' => Carbon::now(),
                'total' => 500000,
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicle_condition' => '',
                'customer_request' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}