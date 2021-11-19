<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MOIREI\Pricing\CastPricing;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'description'];

    protected $casts = [
        'pricing' => CastMultiPricing::class,
    ];

    public function categories(){
        return $this->hasMany(ProductCategory::class);
    }

}
