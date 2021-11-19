<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Helper;
use App\Models\ProductCategory;
use App\Models\ProductPrice;
use App\Models\ProductUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    public function allProducts()
    {
        $products = Product::with('product_prices')->get();
        return view('products.all-products', compact('products'));
    }

    public function viewSingleProduct($slug){
        $product = Product::where('slug', $slug)->firstorfail();
        $product_images = ProductUpload::where('product_id', $product->id)->get();
        return view('products.single-product', compact('product', 'product_images'));
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
                'short_description' => 'required',
                'categories'    => "required|array|min:1",
            ]);

            $slug = Helper::generateSlug('Product', $request->name);

            $product = Product::create([
                'name' => $request->name,
                'sku' => $request->sku,
                'description' =>$request->description,
                'short_description' =>$request->short_description,
                'slug' => $slug,
            ]);

            //map products with categories
            foreach($request->categories as $caretory){
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $caretory,
                ]);
            }

            //add pricing
            foreach($request->price as $key => $value){

                if($value != "" && $request->quantity[$key] != ""){
                    ProductPrice::create([
                        'product_id' => $product->id,
                        'price' => $value,
                        'quantity' => $request->quantity[$key],
                    ]);
                }
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
            $productCategories = ProductCategory:: where('product_id', $id)->get()->pluck('category_id');
            return view('products.edit-product', compact('product', 'categories','images','productCategories'));
        }

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name' => 'required',
                'sku' => ['required', Rule::unique('products')->ignore($product)],
                'short_description' => 'required',
                'description' => 'required',
                'categories'    => "required|array|min:1",
            ]);


            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->description = $request->description;
            $product->short_description =$request->short_description;
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

            //delete current prices
            ProductPrice::where('product_id', $id)->delete();

            //add pricing
            foreach($request->price as $key => $value){

                if($value != "" && $request->quantity[$key] != ""){
                    ProductPrice::create([
                        'product_id' => $product->id,
                        'price' => $value,
                        'quantity' => $request->quantity[$key],
                    ]);
                }
            }


            return redirect()->back()->with('success', 'Product has been updated successfully.');
        }
    }
}
