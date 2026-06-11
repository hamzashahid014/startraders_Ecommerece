<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
   public function allProducts()
    {
        $products = Product::with('category')->latest()->get();
         $categories = Category::all();
         if(Auth::check()&& Auth::user()->role=='admin')
            {
    return view('admin.products', compact('products', 'categories'));
            }
            else
                {
                        return view('user.allproducts', compact('products', 'categories'));
                }
    
    }

public function showProduct(Product $product)
    {
        return view('admin.product_details', compact('product'));
    }   

       public function addProduct(Request $request)
{
     $request->validate([
        'name'  => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'description' => 'required',
            'stock' => 'required',
            'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $image = null;

    if($request->hasFile('image'))
    {

        $image = $request->file('image')
                         ->store('images/products', 'public');

    }

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'sale_price' => $request->sale_price,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'stock'=>$request->stock,
        'slug' => Str::slug($request->name),
        'image' => $image,
        'status' => 1
    ]);

    return redirect()->route('admin.products')->with('success', 'Product added successfully');
}

public function deleteProduct(Product $product)
{
    if ($product->image)
    {
        Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect()
            ->route('admin.products')
            ->with('success', 'Product deleted successfully');
}


public function updateProduct(Request $request)
{
    $product = Product::findOrFail($request->product_id);
    //print_r(product->toArray() );
     $request->validate([
        'name'  => 'required',

        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = $product->image;

if ($request->hasFile('image'))
{
    if ($product->image)
    {
        Storage::disk('public')->delete($product->image);
    }

    $imageName = $request->file('image')
                         ->store('images/products', 'public');
}

    $product->update([
        'name' => $request->name,
        'image' => $imageName,
        'description' => $request->description,
        'slug' => Str::slug($request->name),
    ]);

 return redirect()->route('admin.products')->with('success', 'Product updated successfully');;
}


    //
}
