<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\RepairDetail;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function __construct(Repair $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repair = Repair::with([
            'VehicleInfor' => function ($query) {
                return $query->select('id', 'licensePlates');
            },
            'Customer' => function ($query) {
                return $query->select('id', 'name', 'phone', 'address');
            },
            'User' => function ($query) {
                return $query->where('role', 'staff')->select('id', 'name');
            }
        ])->get();
        return response()->json([
            'result' => $repair
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repair = Repair::with([
            'VehicleInfor' => function ($query) {
                return $query->select('*')->with(['Brand' => function ($sub) {
                    return $sub->select('id', 'name');
                }]);
            },
            'Customer' => function ($query) {
                return $query->select('id', 'name', 'phone', 'address');
            },
            'User' => function ($query) {
                return $query->where('role', 'staff')->select('id', 'name');
            }
        ])->where('id', $id)->first();
        return response()->json([
            'result' => $repair
        ]);
    }

    public function deleteRepair($id)
    {
        $repair = Repair::where('id', $id)->first();
        if (!$repair) {
            return response()->json([
                'status' => 401,
                'message' => 'Không tìm thấy bản ghi'
            ]);
        }
        RepairDetail::where('repair_id', $repair->id)->delete();
        $result = Repair::where('id', $repair->id)->delete();
        if ($result) {
            return response()->json([
                'status' => 200,
                'message' => 'Xóa thành công'
            ]);
        }
        return response()->json([
            'status' => 401,
            'message' => 'Xóa không thành công'
        ]);
    }
    public function addRepair(Request $request)
    {
        return $request->all();
    }

    public function search(Request $request)
    {
        $query = $this->model;
        if ($request->state != '') {
            $query = $query->where('state', $request->state);
        }
        if ($request->name_customer != '') {
            $query = $query->with([
                'Customer' => function ($query) use ($request) {
                    return $query->select('*')->where('name', $request->name_customer);
                }
            ])
                ->whereHas('Customer', function ($query) use ($request) {
                    $query->where('customers.name', $request->name_customer);
                });
        }
        if ($request->name_vehicle != '') {
            $query = $query->with([
                'VehicleInfor' => function ($query) use ($request) {
                    return $query->select('*')->where('licensePlates', $request->name_vehicle);
                }
            ])
                ->whereHas('VehicleInfor', function ($query) use ($request) {
                    $query->where('vehicle_infors.licensePlates', $request->name_vehicle);
                });
        }
         return response()->json([
             'result' => $query->get()
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
