<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(VehicleInforSeeder::class);
        $this->call(AccessaryGroupSeeder::class);
        $this->call(AccessarySeeder::class);
        $this->call(RepairSeeder::class);
        $this->call(RepairDetailSeeder::class);
        $this->call(ReceiptSeeder::class);
        $this->call(ReceiptDetailSeeder::class);
    }
}
