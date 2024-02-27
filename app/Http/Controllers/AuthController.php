<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function showFormLogin(Request $request){
        $email = $request->cookie('email');
        return view('login', compact('email'));
    }

    function login(Request $request)  {
        $email = $request->email;
        $password = $request->password;
        if($email == 'huy@gmail.com' && $password == '1234'){
            // tạo session lưu email đăng nhập
            session()->put('userEmail', $email);
            // session('userEmail', $email);
            $cookie = cookie('email', $email, 60);
            return redirect()->route('home')->cookie($cookie);
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