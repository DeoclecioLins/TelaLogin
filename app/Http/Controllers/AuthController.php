<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() === true){
            return view('admin.dashboard');
        }
        return redirect()->route('admin.login');
    }
    public function showFormLogin()
    {
        //return view('admin.formLogin');
        return view('admin.loginB');
    }
    public function login(Request $request)
    {


        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->route('admin');
        }
        return redirect()->back()->withInput()->withErrors('[ERROR] Os dado informados não conferem!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');

    }
}
