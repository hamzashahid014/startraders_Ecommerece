<?php
namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

                   print_r($cart);
                  
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
            
    return back()->with('success','Product added to cart');
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
}
