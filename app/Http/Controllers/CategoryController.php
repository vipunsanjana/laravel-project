<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function createCategory (Request $request){
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        
        if($request->method()=='GET')
        {
            return view('category.create-category', compact('categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'parent_id' => 'nullable|numeric'
            ]);

            $slug = Helper::generateSlug('Category', $request->name);

            Category::create([
                'name' => $request->name,
                'slug' => $slug,
                'parent_id' =>$request->parent_id == 0 ? null : $request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }

    public function allCategories()
    {
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        return view('category.all-category', compact('categories'));
    }

    public function editCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        if($request->method()=='GET')
        {
            $categories = Category::where('parent_id', null)->where('id', '!=', $category->id)->orderby('name', 'asc')->get();
            return view('category.edit-category', compact('category', 'categories'));
        }

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'     => 'required',
                'parent_id'=> 'nullable|numeric'
            ]);
            if($request->name != $category->name || $request->parent_id != $category->parent_id)
            {
                if(isset($request->parent_id))
                {
                    $checkDuplicate = Category::where('name', $request->name)->where('parent_id', $request->parent_id)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist in this parent.');
                    }
                }
                else
                {
                    $checkDuplicate = Category::where('name', $request->name)->where('parent_id', null)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist with this name.');
                    }
                }
            }

            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->save();
            return redirect()->back()->with('success', 'Category has been updated successfully.');
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if(count($category->subcategory))
        {
            $subcategories = $category->subcategory;
            //make sub categories as main categories
            foreach($subcategories as $cat)
            {
                $cat = Category::findOrFail($cat->id);
                $cat->parent_id = null;
                $cat->save();
            }
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
