<?php

namespace App\Http\Controllers;

use App\Models\Accessary;
use Illuminate\Http\Request;

class AccessaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessary = Accessary::with([
            'AccessaryGroup' => function ($query) {
                return $query->select('id', 'name');
            },
            'Unit' => function ($query) { 
                return $query->select('id','name');
            }
        ])
        // ->orderBy('created_at', 'desc')
            ->get();
        // $group = Accessary::with('Group', function ($sub) use ($accessary) {
        //     return $sub->where('id', $accessary->accessary_group_id)->select(['id', 'name']);
        // });
        return response()->json([
            'result' => $accessary
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $accessary = Accessary::where('id', $id)->first();
        if (!$accessary) {
            return response()->json([
                'status' => 401,
                'message' => 'Không tìm thấy bản ghi'
            ]);
        }
        $result = Accessary::where('id', $accessary->id)->delete();
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
}