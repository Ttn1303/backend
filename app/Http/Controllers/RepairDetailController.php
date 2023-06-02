<?php

namespace App\Http\Controllers;

use App\Models\Accessary;
use App\Models\Repair;
use App\Models\RepairDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RepairDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $detail = RepairDetail::with([
        //     'Accessaries' => function ($query) {
        //         return $query->select('id', 'name', 'unit_id', 'price')->with([
        //             'Unit' => function ($query) {
        //                     return $query->select('id', 'name');
        //                 }
        //         ]);
        //     }
        // ])->where('repair_id', $id)->get();
        $detail = RepairDetail::join('accessaries', 'repair_detail.accessary_id', 'accessaries.id')
            ->join('units', 'units.id', 'accessaries.unit_id')
            ->select('repair_detail.*', 'accessaries.name as name_accessary', 'accessaries.price as price', 'units.name as name_unit')
            ->where('repair_id', $id)
            ->get();

        return response()->json([
            'result' => $detail
        ]);
    }

    public function addAccessaryQuantity(Request $request, $id)
    {
        $repair = Repair::where('id', $id)->first();
        $repair_detail = RepairDetail::where('repair_id', $repair->id)->pluck('accessary_id')->toArray();
        foreach ($repair_detail as $value) {
            if ($value == $request->accessary) {
                $updateRepairDetail = RepairDetail::where('repair_id', $repair->id)->where('accessary_id', $value)->first();
                RepairDetail::where('id', $updateRepairDetail->id)->update([
                    'quantity' => $updateRepairDetail->quantity + $request->quantity
                ]);
                return 'update';
            }
            RepairDetail::create([
                'repair_id' => $repair->id,
                'accessary_id' => $request->accessary,
                'quantity' => $request->quantity
            ]);
            return 'xyz';
        }
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $repair = Repair::where('id', $id)->first();
            if (!$repair) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Không tìm thấy bản ghi'
                ]);
            }
            Repair::where('id', $id)->update(['state' => 3, 'total' => $request->total]);

            foreach ($request->payments as $product) {
                $productById = Accessary::where('id', $product['accessary_id'])->first();
                if (!$productById) {
                    return response()->json([
                        'status' => 401,
                        'message' => 'Không tìm thấy bản ghi'
                    ]);
                }

                if ($productById->quantity <= 0) {
                    return response()->json([
                        'status' => 401,
                        'message' => 'Số lượng tồn kho không đủ'
                    ]);
                } elseif ($product['quantity'] > $productById->quantity) {
                    return response()->json([
                        'status' => 401,
                        'message' => 'Số lượng nhập vào lớn hơn số lượng tồn kho. xin vui lòng kiểm tra lại'
                    ]);
                }
                Accessary::where('id', $product['accessary_id'])->update(['quantity' => $productById->quantity - $product['quantity']]);
            }

            DB::commit();
            return 'success';
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return 'fail';
        }
    }

    public function destroy($id, Request $request)
    {
        $repair = Repair::where('id', $id)->first();
        if (!$repair) {
            return response()->json([
                'status' => 401,
                'message' => 'Không tìm thấy bản ghi'
            ]);
        }

        $repairDetail = RepairDetail::where('repair_id', $repair->id)->get();
        if (!$repairDetail) {
            return response()->json([
                'status' => 401,
                'message' => 'Không tìm thấy bản ghi'
            ]);
        }

        $deleteAccessary = $repairDetail->where('id', $request->accessary_id)->first();
        if (!$deleteAccessary) {
            return response()->json([
                'status' => 401,
                'message' => 'Không tìm thấy bản ghi'
            ]);
        }
        $result = $deleteAccessary->delete();

        if ($result) {
            return response()->json([
                'status' => 200,
                'message' => 'Success'
            ]);
        }

        return response()->json([
            'status' => 401,
            'message' => 'Failed'
        ]);
    }
}