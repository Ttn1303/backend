<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VehicleInforSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_infors')->insert([
            [
                'licensePlates' => '29-K1 48601',
                'type_vehicle' => 'Xe số',
                'yearProduct' => 2015,
                // 'frameNumber' => '',
                'color' => 'Trắng',
                'capacity' => '125cc',
                'brand_id' => 1,
                'model' => '',
                'kmNumber' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'licensePlates' => '29-K1 48602',
                'type_vehicle' => 'Xe số',
                'yearProduct' => 2015,
                // 'frameNumber' => '',
                'color' => 'Trắng',
                'capacity' => '125cc',
                'brand_id' => 1,
                'model' => '',
                'kmNumber' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'licensePlates' => '29-K1 48603',
                'type_vehicle' => 'Xe số',
                'yearProduct' => 2015,
                // 'frameNumber' => '',
                'color' => 'Trắng',
                'capacity' => '125cc',
                'brand_id' => 1,
                'model' => '',
                'kmNumber' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'licensePlates' => '29-K1 48604',
                'type_vehicle' => 'Xe số',
                'yearProduct' => 2015,
                // 'frameNumber' => '',
                'color' => 'Trắng',
                'capacity' => '125cc',
                'brand_id' => 1,
                'model' => '',
                'kmNumber' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'licensePlates' => '29-K1 48605',
                'type_vehicle' => 'Xe số',
                'yearProduct' => 2015,
                // 'frameNumber' => '',
                'color' => 'Trắng',
                'capacity' => '125cc',
                'brand_id' => 1,
                'model' => '',
                'kmNumber' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'licensePlates' => '29-K1 48606',
                'type_vehicle' => 'Xe số',
                'yearProduct' => 2015,
                // 'frameNumber' => '',
                'color' => 'Trắng',
                'capacity' => '125cc',
                'brand_id' => 1,
                'model' => '',
                'kmNumber' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
