<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductUpload;

class Helper extends Model
{
    use HasFactory;

    public static function getCategoryFromID($id)
    {
        return Category::where('id', $id)->first()->name;
    }

    public static function getProductMainImage($id){
        $images = ProductUpload::where('product_id', $id)->first();
        if($images){
            return $images->file_path;
        }
        else{
            return '/uploads/products/default.png';
        }
        
    }
}