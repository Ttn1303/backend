<?php

namespace App\Http\Controllers;

use App\Models\Accessary;
use App\Models\Receipt;
use App\Models\ReceiptDetail;
use App\Models\User;
use Illuminate\Http\Request;

class AccessaryController extends Controller
{
    public function __construct(Accessary $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $query = $this->model->with([
            'AccessaryGroup' => function ($query) {
                return $query->select('id', 'name');
            },
            'Unit' => function ($query) {
                return $query->select('id', 'name');
            },
        ]);

        if ($request->group != '') {
            $query = $query->where('accessary_group_id', $request->group);
        }

        if ($request->page_size != '') {
            $query = $query->paginate($request->page_size);
        } else {
            $query = $query->paginate(10);
        }

        return response()->json([
            'result' => $query
        ]);
    }
    public function list()
    {
        $query = $this->model->with([
            'AccessaryGroup' => function ($query) {
                return $query->select('id', 'name');
            },
            'Unit' => function ($query) {
                return $query->select('id', 'name');
            },
        ])->get();

        return response()->json([
            'result' => $query
        ]);
    }

    public function addQuantity($id, Request $request)
    {
        $accessary = Accessary::where('id', $id)->first();
        // $accessary1 = Accessary::whereIn('id', $id)->get();
        // foreach ($accessary1 as $value) {
        //     if (!$value) {
        //         return response()->json([
        //             'status' => 401,
        //             'message' => 'Không tìm thấy bản ghi'
        //         ]);
        //     }

        //     $receipt = Receipt::create([
        //         'user_id' => $request->user_id,
        //         'receipt_name' => $request->receipt_name,
        //         'receipt_date' => $request->date,
        //         'total' => $request->quantity * $request->import_price,
        //         'note' => $request->note
        //     ]);

        //     $receipt_detail = ReceiptDetail::create([
        //         'receipt_id' => $receipt->id,
        //         'accessary_id' => $accessary->id,
        //         'quantity' => $request->quantity,
        //         'import_price' => $request->import_price
        //     ]);

        //     $result = Accessary::where('id', $id)->update([
        //         'quantity' => $accessary->quantity + $request->quantity
        //     ]);

        //     if ($receipt && $receipt_detail && $result) {
        //         return response()->json([
        //             'status' => 200,
        //             'message' => 'Thêm thành công'
        //         ]);
        //     }

        //     return response()->json([
        //         'status' => 401,
        //         'message' => 'Thêm không thành công'
        //     ]);
        // }
        if (!$accessary) {
            return response()->json([
                'message' => 'Không tìm thấy bản ghi'
            ], 404);
        }

        $receipt = Receipt::create([
            'user_id' => $request->user_id,
            'receipt_name' => $request->receipt_name,
            'receipt_date' => $request->date,
            'total' => $request->quantity * $request->import_price,
            'note' => $request->note
        ]);

        $receipt_detail = ReceiptDetail::create([
            'receipt_id' => $receipt->id,
            'accessary_id' => $accessary->id,
            'quantity' => $request->quantity,
            'import_price' => $request->import_price
        ]);

        $result = Accessary::where('id', $id)->update([
            'quantity' => $accessary->quantity + $request->quantity
        ]);

        if ($receipt && $receipt_detail && $result) {
            return response()->json([
                'message' => 'Thêm thành công'
            ], 200);
        }

        return response()->json([
            'message' => 'Thêm không thành công'
        ], 401);
    }


    /**
     * Show the form for creating a new resource.
     *
     */
    public function listUser()
    {
        $user = User::select('id', 'name', 'role')->get();
        return response()->json([
            'result' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $accessary = Accessary::create([
            'accessary_group_id' => $request->accessary_group_id,
            'code' => $request->code,
            'name' => $request->name,
            'unit_id' => $request->unit_id,
            'price' => $request->price,
            'import_price' => $request->import_price,
            'description' => $request->description
        ]);

        if ($accessary) {
            return response()->json([
                'message' => 'Thêm thành công'
            ], 200);
        }

        return response()->json([
            'message' => 'Thêm không thành công'
        ], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $accesrary = Accessary::select('id', 'name')->where('id', $id)->first();

        return response()->json([
            'result' => $accesrary
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
     */
    public function destroy($id)
    {
        $accessary = Accessary::where('id', $id)->first();
        if (!$accessary) {
            return response()->json([
                'message' => 'Không tìm thấy bản ghi'
            ], 404);
        }

        $result = Accessary::where('id', $accessary->id)->delete();
        if ($result) {
            return response()->json([
                'message' => 'Xóa thành công'
            ], 200);
        }

        return response()->json([
            'message' => 'Xóa không thành công'
        ], 401);
    }
}