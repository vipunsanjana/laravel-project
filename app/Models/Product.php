<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductCategory;
use App\Models\ProductUpload;
use App\Models\ProductPrice;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku','short_description', 'description','slug'];

    public function categories(){
        return $this->hasMany(ProductCategory::class);
    }

    public function product_prices(){
        return $this->hasMany(ProductPrice::class);
    }

    public function product_images(){
        return $this->hasMany(ProductUpload::class);
    }
}
