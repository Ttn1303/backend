<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $user = User::where('email', $request['email']);
        $userInformation = $user->first();
        $countUser = $user->count();
        $infor = $user->select('*')->get();

        if (!$userInformation) {
            return response()->json([
                'status' => 401,
                'message' => 'Tài khoản mật khẩu là bắt buộc'
            ]);
        }

        if ($countUser > 0 && Hash::check($request['password'], $userInformation->password)) {
            return response()->json([
                'status' => 200,
                'message' => 'Đăng nhập thành công',
                'result' => $infor
            ]);

        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Tài khoản hoặc mật khẩu không đúng'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
    }
}