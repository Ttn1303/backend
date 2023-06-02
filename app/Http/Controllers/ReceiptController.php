<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\ReceiptDetail;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index(Request $request)
    {
        $receipt = ReceiptDetail::with([
            'Receipt' => function ($query) {
                return $query->select('id', 'user_id', 'receipt_name', 'receipt_date', 'total', 'note')->with([
                    'User' => function ($stub) {
                        return $stub->select('id', 'name');
                    },
                ]);
            },
            'Accessary' => function ($query) {
                return $query->select('id', 'name');
            },
        ]);

        if ($request->name != '') {
            $receipt = $receipt->whereHas('Accessary', function ($query) use ($request) {
                $query->where('accessaries.name', 'LIKE', '%' . $request->name . '%');
            });
        }

        if ($request->page_size != '') {
            $receipt = $receipt->paginate($request->page_size);
        } else {
            $receipt = $receipt->paginate(10);
        }
        return response()->json([
            'result' => $receipt
        ]);
    }
}