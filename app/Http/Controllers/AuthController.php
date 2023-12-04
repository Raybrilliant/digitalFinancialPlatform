<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login(Request $req){
        $user = User::where('email',$req->email)->first();
        if ($user) {
            if ($user-> role == '2') {
                $pass = User::where('password',$req->password)->first();
                if ($pass) {
                    session()->put('id',$pass->id);
                    return redirect()->intended('/');
                }
            }
        }
        return back()->with('msg','Email or Password Salah Bang !');
        
    }

    function register(Request $req){
        $data = [
            'email' => $req->email,
            'password' => $req->password,
            'role' => 2
        ];
        if ($data['password'] == $req->reTypePassword) {
            User::create($data);
            return redirect()->intended('/login');
        }
        return back()->with('msg','passwordnya gak sama bang');
    }

    //  Admin
    function adminLogin(Request $req){
        $user = User::where('email',$req->email)->first();
        if ($user){
            if ($user-> role == '1') {
                $pass = User::where('password',$req->password)->first();
                if ($pass) {
                    session()->put('role',$pass->role);
                    return redirect()->intended('/admin');
                }
            }
        }
        return back()->with('msg','Email or Password Salah Bang !');
    }

    function logout(){
        session()->invalidate();
        return redirect()->intended('/');
    }
}
