<?php
namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function clearCart()
{
    session()->forget('cart');

    return back()->with('success', 'Cart cleared successfully');
}
    public function addItemToCart(Request $request)
    {

    
        $product=Product::findOrFail($request->product_id);
    
        $cart= session()->get('cart',[]);
        if(isset($cart[$product->id]))
            {
                //print_r($request->product_qty);
                $cart[$product->id]['quantity']+=$request->product_qty;

                   //print_r($cart);
                  
            }
            else{
                $cart[$product->id]=[
                    'id'=>$request->product_id,
                    'name'=>$product->name,
                    'price'=>$product->sale_price,
                     'quantity'=>$request->product_qty,
                    'image'=>$product->image,
                ];
            }
            session()->put('cart',$cart);
            
    return back()->with('addToCart_success','Product added to cart');
    }

    public function cartIncrease($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id]))
        {
            $cart[$id]['quantity']++;

        }

        session()->put('cart',$cart);

        return back();
    }
      public function cartDecrease($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id]))
        {
            $cart[$id]['quantity']--;

        }

        session()->put('cart',$cart);

        return back();
    }
    public function removeCartItem($id)
{
    $cart = session()->get('cart');

    unset($cart[$id]);

    session()->put('cart',$cart);

    return back();
}


public function checkout()
{
    $cart=session()->get('cart',[]);
    if(empty($cart))
        {
              return redirect('/')->with('error', 'Your cart is empty');
        }
           return view('user.checkout', compact('cart'));
}

public function placeOrder(Request $request)
{
    $cart = session()->get('cart', []);
    $cartTotal = 0;

foreach($cart as $item)
{
    $cartTotal += $item['price'] * $item['quantity'];
}
       $validator = Validator::make($request->all(), [
     'order_type' => 'required',
        'phone' => 'required',
        'payment_method' => 'required',
    ]);

    if ($validator->fails()) {

        return redirect()->route('user.checkout')->withErrors($validator, 'Err')->withInput();
    }
    $order=Order::create([
        'user_id'=>Auth::id(),
        'order_type'=>$request->order_type,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'notes'=>$request->notes,
        'payment_method'=>$request->payment_method,
        'payment_status'=>'pending',
        'total_amount'=>$cartTotal,
        'status'=>'pending',
    ]);

    foreach($cart as $productId => $item)
{
    OrderItem::create([
        'order_id' => $order->id,

        'product_id' => $productId,

        'price' => $item['price'],

        'quantity' => $item['quantity'],

        'subtotal' => $item['price'] * $item['quantity']
    ]);
}
session()->forget('cart');
 return redirect()->route('user.checkout')->with('success', 'Product Added Successfuly');

}
}
