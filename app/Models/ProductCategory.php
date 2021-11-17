<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'category_id'];

    public function products(){
        return $this->belongsToMany(App\Models\Product::class);
    }

    public function categories(){
        return $this->belongsToMany(App\Models\Category::class);
    }
}
