<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
     public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function loginform()
    {
        return view('admin.login');
    }
    public function chkeckAdminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
     'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator, 'login')->withInput();
    }

    if (Auth::attempt($validator->validated())) {

        return redirect()->route('admin.dashboard');
    }
    return back()->withErrors(['login' => 'Invalid Email or Password'], 'login')->withInput();
        echo print_r($request->all());
    }

     public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.loginform')->with('msg',"Login Here");
    }
}
