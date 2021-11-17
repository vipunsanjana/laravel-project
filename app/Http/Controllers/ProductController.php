<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products = Product::get();
        return view('products.all-products', compact('products'));
    }

    public function createProduct (Request $request){

        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('products.create-product', compact('categories'));
        }
        if($request->method()=='POST')
        {

            // dd($request);
            $validator = $request->validate([
                'name' => 'required',
                'sku' => 'required|unique:products',
                'description' => 'required',
                'categories'    => "required|array|min:1",
            ]);

            $product = Product::create([
                'name' => $request->name,
                'sku' => $request->sku,
                'description' =>$request->description
            ]);

            foreach($request->categories as $caretory){
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $caretory,
                ]);
            }

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }
}
