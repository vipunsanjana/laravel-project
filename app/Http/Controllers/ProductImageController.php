<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductUpload;

class ProductImageController extends Controller
{
    public function store(Request $request)
    {
      $file = new ProductUpload;

      if ($request->file('file')) {
        $filePath = $request->file('file');
        $fileName = $filePath->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
      }

      $file->product_id = 2;
      $file->file_name = $fileName;
      $file->file_path = '/storage/'.$path;
      $file->file_type = $request->file->extension();
      $file->save();

      return response()->json([ 'success' => $fileName ]);
    }

    public function remvoeFile(Request $request)
    {
        $name =  $request->get('name');
        ProductUpload::where(['name' => $name])->delete();

        return $name;
    }
}
