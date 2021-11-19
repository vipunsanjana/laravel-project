<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\ProductUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    public function allProducts()
    {
        $products = Product::all();
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

            //add new categories
            foreach($request->categories as $caretory){
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $caretory,
                ]);
            }

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::where('id', $id)->delete();

        return redirect()->back()->with('delete', 'Product has been deleted successfully.');
    }

    public function editProduct($id, Request $request)
    {
        $product = Product::findOrFail($id);
        if($request->method()=='GET')
        {
            $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
            $images = ProductUpload::where('product_id', $id)->get();
            return view('products.edit-product', compact('product', 'categories','images'));
        }

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name' => 'required',
                'sku' => ['required', Rule::unique('products')->ignore($product)],
                'description' => 'required',
                'categories'    => "required|array|min:1",
            ]);
            

            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->description = $request->description;
            $product->save();

            //delete current categories
            ProductCategory::where('product_id', $id)->delete();

            //add new categories
            foreach($request->categories as $caretory){
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $caretory,
                ]);
            }
            return redirect()->back()->with('success', 'Product has been updated successfully.');
        }
    }
}
