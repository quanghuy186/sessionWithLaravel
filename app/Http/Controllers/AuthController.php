<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function showFormLogin(){
        return view('login');
    }

    function login(Request $request)  {
        $email = $request->email;
        $password = $request->password;
        if($email == 'admin@gmail.com' && $password == '1234'){
            // tạo session lưu email đăng nhập
            session('userEmail', $email);
            return redirect()->route('home');
        } else {
            // session flash chỉ được tồn tại duy nhất trong một request
            session()->flash('error', 'Account not exist');
            return redirect()->route('auth.showFormLogin');
        }
    }

    function logout(){
        // xóa tất cả các session
        session()->flush();
        return redirect()->route('auth.showFormLogin');
    }
}