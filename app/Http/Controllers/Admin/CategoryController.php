<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CategoryController extends Controller
{

public function show(Category $category)
{
    return view('admin.category_details', compact('category'));
}
    public function allCategories()
    {
        $categories = Category::with('products')->latest()->get();
        if(Auth::check() && Auth::user()->role=='admin')
            {
        return view('admin.categories', compact('categories'));
        }
        else
            {
                 return view('user.categories', compact('categories'));
        }
    }

     public function createCategory()
    {
        return view('admin.createCategory');
    }

    public function addCategory(Request $request)
{
     $request->validate([
        'name'  => 'required',

        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $image = null;

    if($request->hasFile('image'))
    {

        $image = $request->file('image')
                         ->store('images/categories', 'public');

    }

    Category::create([
        'name' => $request->name,
        'description' => $request->description,
        'slug' => Str::slug($request->name),
        'image' => $image,
        'status' => 1
    ]);

    return redirect()->route('admin.categories')->with('success', 'Category added successfully');
}

public function updateCategory(Request $request)
{
    $category = Category::findOrFail($request->category_id);
    //print_r(category->toArray() );
     $request->validate([
        'name'  => 'required',

        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = $category->image;

if ($request->hasFile('image'))
{
    if ($category->image)
    {
        Storage::disk('public')->delete($category->image);
    }

    $imageName = $request->file('image')
                         ->store('images/categories', 'public');
}

    $category->update([
        'name' => $request->name,
        'image' => $imageName,
        'description' => $request->description,
        'slug' => Str::slug($request->name),
    ]);

 return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
}

public function deleteCategory(Category $category)
{
    if ($category->image)
    {
        Storage::disk('public')->delete($category->image);
    }

    $category->delete();

    return redirect()
            ->route('admin.categories')
            ->with('success', 'Category deleted successfully');
}
}
