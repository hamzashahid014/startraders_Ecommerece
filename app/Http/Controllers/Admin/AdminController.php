<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
class AdminController extends Controller
{
     public function dashboard()
    {
        if(Auth::check() && Auth::user()->role=='admin')
            {
                   $orders = Order::all();
                   $users=User::all();
                   $products=Product::count();

                   return view('admin.dashboard',compact('orders','users','products'));
            }
            else{
                  return redirect(route('admin.loginform'))->with('msg','Please Login As Admin');
            }
    }

      public function allOrders()
    {
         $orders = Order::latest()->get();
        return view('admin.allOrders',compact('orders'));
    }

     public function orderdetails(Order $order)
    {
      //  dd('here');
            return view('admin.orderDetails',compact('order'));
    }

     public function acceptOrder(Order $order)
    {
       //dd($order);
       $order->update([
        'status' => 'approved',
    ]);
              return redirect()->route('admin.allOrders');
    }
        public function approvedOrders()
    {
         $orders = Order::where('status', 'approved')->latest()->get();
        return view('admin.approvedOrders',compact('orders'));
    }
         public function pendingOrders()
    {
         $orders = Order::where('status', 'approved')->latest()->get();
        return view('admin.pendingOrders',compact('orders'));
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
        return redirect()->route('admin.loginform')->with('msg',"Login Here Now");
    }
}
