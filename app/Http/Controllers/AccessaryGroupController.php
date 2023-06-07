<?php

namespace App\Http\Controllers;

use App\Models\AccessaryGroup;
use App\Models\Unit;
use Illuminate\Http\Request;

class AccessaryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function indexGroup()
    {
        $group = AccessaryGroup::select('id', 'name')->get();
        return response()->json([
            'result' => $group
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function indexUnit()
    {
        $unit = Unit::select('id', 'name')->get();
        return response()->json([
            'result' => $unit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $accessary_group = AccessaryGroup::create([
            'name' => $request->name
        ]);

        if ($accessary_group) {
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
        //
    }
}