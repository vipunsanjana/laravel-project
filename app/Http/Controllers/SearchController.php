<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request) {
        
        if ($request->search_value==NULL) {
            $data= NULL;
        } else {
            $data=Product::where('name','LIKE', '%'.$request->search_value.'%')->get();
        }

        // dd($data);
        return view('products.search-results')->with('results',$data);}
}
