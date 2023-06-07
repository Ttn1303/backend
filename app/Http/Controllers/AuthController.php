<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $user = User::where('email', $request['email']);
        $userInformation = $user->first();
        $countUser = $user->count();
        $infor = $user->select('*')->get();

        if ($countUser > 0 && Hash::check($request['password'], $userInformation->password)) {
            return response()->json([
                'message' => 'Đăng nhập thành công',
                'result' => $infor
            ], 200);

        } else {
            return response()->json([
                'message' => 'Tài khoản hoặc mật khẩu không đúng'
            ], 401);
        }
    }

    public function change_password(Request $request)
    {
        $user = User::where('email', $request->email);
        $userInformation = $user->first();
        $countUser = $user->count();

        if ($countUser < 0 || $countUser > 0 && !Hash::check($request->old_password, $userInformation->password)) {
            return response()->json([
                'message' => 'Tài khoản hoặc mật khẩu không đúng'
            ], 401);
        }
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            'message' => 'Đổi mật khẩu thành công'
        ], 200);
    }
}