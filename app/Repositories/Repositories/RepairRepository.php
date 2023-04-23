<?php

namespace App\Repositories;

use App\Models\Repair;

class RepairRepository extends BaseRepository
{
    public function __construct(Repair $model)
    {
        $this->model = $model;
    }

    public function query($options)
    {
        $query = $this->model;

        if (isset($options['state'])) {
            $query = $query->where('state', $options['state']);
        }

        if (!empty($options['name_customer'])) {
            // $customerId = Customer::where('name', $request->name_customer)->select('id')->get();
            // dd($customerId);
            $query = $query->with([
                'Customer' => function ($query) use ($options) {
                    return $query->select('*')->where('name', $options['name_customer']);
                }
            ])
            ->whereHas('Customer', function ($sub) use ($options) {
                $sub->where('customers.name', $options['name_customer']);
            })->get();
        }

        // if (!empty($request->name_vehicle)) {
        //     $repair = Repair::with([
        //         'VehicleInfor' => function ($query) use ($request) {
        //             return $query->select('*')->where('licensePlates', $request->name_vehicle);
        //         }
        //     ])->get();            
        // }

        return $query;
    }
}
