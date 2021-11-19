<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductPrice extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'price', 'quantity'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
