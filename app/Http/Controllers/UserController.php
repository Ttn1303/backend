<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->model->select('id', 'name', 'role', 'email', 'age', 'address', 'phone', 'sex');

        if ($request->name != '') {
            $query = $query->where('name', $request->name);
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'role' => $request->role
        ]);

        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => 'Thêm thành công'
            ]);
        }

        return response()->json([
            'status' => 401,
            'message' => 'Thêm không thành công'
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
        $user = User::select('id', 'name', 'role', 'email', 'age', 'address', 'phone', 'sex')->where('id', $id)->first();

        return response()->json([
            'result' => $user
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
        $user = User::where('id', $id)->first();
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Không tìm thấy bản ghi'
            ]);
        }

        $result = User::where('id', $id)->update([
            'age' => $request->age,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($result) {
            return response()->json([
                'status' => 200,
                'message' => 'Sửa thành công'
            ]);
        }

        return response()->json([
            'status' => 401,
            'message' => 'Sửa không thành công'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Không tìm thấy bản ghi'
            ]);
        }

        $result = User::where('id', $user->id)->delete();
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