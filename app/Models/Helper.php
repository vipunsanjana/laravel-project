<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPrice;
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

    public static function generateSlug ($model, $string){
        // dd($model);
        $slug = '';
        if($model == 'Category'){
            if (!empty($string)) {
                $temp = str_slug($string, '-');
                if (!Category::all()->where('slug', $temp)->isEmpty()) {
                    $i = 1;
                    $new_slug = $temp . '-' . $i;
                    while (!Category::all()->where('slug', $new_slug)->isEmpty()) {
                        $i++;
                        $new_slug = $temp . '-' . $i;
                    }
                    $temp = $new_slug;
                }
                $slug = $temp;
            }
        }
        if($model == 'Product'){
            if (!empty($string)) {
                $temp = str_slug($string, '-');
                if (!Product::all()->where('slug', $temp)->isEmpty()) {
                    $i = 1;
                    $new_slug = $temp . '-' . $i;
                    while (!Product::all()->where('slug', $new_slug)->isEmpty()) {
                        $i++;
                        $new_slug = $temp . '-' . $i;
                    }
                    $temp = $new_slug;
                }
                $slug = $temp;
            }
        }
        return $slug;
    }
}