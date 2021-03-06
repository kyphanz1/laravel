<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\modle_taikhoan;
class AuthController extends Controller
{
    public function getlogin(){
        return view('Login/login');
    }
    public function postlogin(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        $request->validate(
            [
                'username' => 'required|min:3',
                'password' => 'min:3'
            ],
            [
                'username.required' => 'Username không được để trống',
                'username.min' => 'Username quá ngắn',
                'password.min' => 'Password quá ngắn'
            ]

        );

        if(Auth::attempt(['name'=>$username,'password'=>$password])){
            return view('thanhcong');
        }
        else
            return view('Login/login');

//        $user = modle_taikhoan::find(2);
//        dd( Auth::login($user));
//        Auth::login($user);
//        return view('thanhcong');

    }

}
