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
                'state' => 'Tiếp nhận',
                'user_id' => 1,
                'appointmentdate' => '2023-04-05 06:27:03',
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicleCondition' => '',
                'customerRequest' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 2,
                'vehicle_infor_id' => 2,
                'state' => 'Tiếp nhận',
                'user_id' => 2,
                'appointmentdate' => '2023-04-05 06:27:03',
                'note' => '',
                'service' => 'Sửa chữa',
                'vehicleCondition' => '',
                'customerRequest' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 3,
                'vehicle_infor_id' => 3,
                'state' => 'Tiếp nhận',
                'user_id' => 3,
                'appointmentdate' => '2023-04-05 06:27:03',
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicleCondition' => '',
                'customerRequest' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
