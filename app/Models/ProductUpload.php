<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUpload extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'file_name','file_path','file_type'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
