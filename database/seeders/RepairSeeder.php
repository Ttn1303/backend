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
                'state' => 0,
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
                'code' => 'PSC00011',
                'state' => 1,
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
                'code' => 'PSC00011',
                'state' => 2,
                'user_id' => 3,
                'appointmentdate' => '2023-04-05 06:27:03',
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicleCondition' => '',
                'customerRequest' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 4,
                'vehicle_infor_id' => 4,
                'code' => 'PSC00044',
                'state' => 0,
                'user_id' => 4,
                'appointmentdate' => '2023-04-05 06:27:03',
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicleCondition' => '',
                'customerRequest' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 5,
                'vehicle_infor_id' => 5,
                'code' => 'PSC00055',
                'state' => 0,
                'user_id' => 5,
                'appointmentdate' => '2023-04-05 06:27:03',
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicleCondition' => '',
                'customerRequest' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'customer_id' => 6,
                'vehicle_infor_id' => 6,
                'code' => 'PSC00066',
                'state' => 0,
                'user_id' => 6,
                'appointmentdate' => '2023-04-05 06:27:03',
                'note' => '',
                'service' => 'Bảo dưỡng',
                'vehicleCondition' => '',
                'customerRequest' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}