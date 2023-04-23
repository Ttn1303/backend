<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Repair;
use App\Models\RepairDetail;
use App\Repositories\RepairRepository;
use Illuminate\Http\Request;

class RepairController extends Controller
{

    public function __construct(RepairRepository $repairRepo)
    {
        $this->repairRepo = $repairRepo;
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
                // ::with([
                    
            },
            'Customer' => function ($query) {
                return $query->select('id', 'name', 'phone', 'address');
            },
            'User' => function ($query) {
                return $query->where('role', 'staff')->select('id', 'name');
            }
        ])->where('id', $id)->first();
        // dd($repair);
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
        // dd($repair);
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
        // $options = $request->all();
        // $this->
        // return response()->json([
        //     'result' => $repair
        // ]);
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