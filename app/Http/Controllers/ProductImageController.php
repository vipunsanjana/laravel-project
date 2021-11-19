<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductUpload;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use File;
use Storage;
use Auth;

class ProductImageController extends Controller
{
    public function store(Request $request, $id)
    {
      $file = new ProductUpload;

      if ($request->file('file')) {
        $filePath = $request->file('file');
        $fileName = $filePath->getClientOriginalName();

        $image = Image::make($filePath);
        $tempPath = public_path().'/uploads/products/'.$id.'/';
        if (!file_exists($tempPath)) {
            File::makeDirectory($tempPath, 0755, true, true);
        }
        // generate same size images
        $image->fit(
            500,
            500,
            function ($constraint) {
                $constraint->upsize();
            }
        );
        $image->save($tempPath . $fileName);
      }
    
      $file->product_id = $id;
      $file->file_name = $fileName;
      $file->file_path = '/uploads/products/'.$id.'/'. $fileName;
      $file->file_type = $request->file->extension();
      $file->save();

      return response()->json([ 'success' => $fileName ]);
    }

    public function remvoeFile(Request $request, $id)
    {
        $name =  $request->get('name');
        ProductUpload::where(['file_name' => $name])->where('product_id', $id)->delete();

        return $name;
    }
}
