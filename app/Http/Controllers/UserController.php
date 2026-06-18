<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    public function homePage()
    {
        $categories=Category::with('products')->latest()->take(6)->get();
         $products = Product::with('category')->latest()->take(8)->get();
        return view('user.home', compact('categories','products'));
    }

    public function about()
    {
        return view('user.about');
    }
    public function contact()
    {
        return view('user.contact');
    }

     public function checkLogin(Request $request)
    {

    $validator = Validator::make($request->all(), [
     'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator, 'login')->withInput();
    }

    if (Auth::attempt($validator->validated())) {
        //this filled is hidden and is used to navigate to chkoutpage
        if($request->filled('redirect_to'))
{
    
    return redirect($request->redirect_to);
}
else
    {

        return redirect()->route('user.dashboard');
    }
        
    }
    return back()->withErrors(['login' => 'Invalid Email or Password'], 'login')->withInput();
        // echo print_r($request->all());
      
    }

    public function myOrders()
    {
        $orders=Auth::user()->orders()->latest()->get();
          return view('user.myOrders',compact('orders'));
    }
     public function orderDetails(Order $order)
    {
        if($order->user_id!=Auth::id())
            {
                abort(403);
            }
            return view('user.orderDetails',compact('order'));
    }
      public function dashboard()
    {

        return view('user.dashboard');
       
    }

    public function userLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        //$request->session()->regenerateToken();

    return redirect('/')->with('success', 'Logged out successfully');

    }

    public function registerUser(Request $request)
    {

    $validator=Validator::make($request->all(),[
        'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

    ]

    );
    
        if($validator->fails())
            {
                return redirect()->back()->withErrors($validator,'register')->withInput();
            }
        $user=User::create($validator->validated());

        return redirect('/')->with('success', 'Registration successful. Please log in.');
    }


}
