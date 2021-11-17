<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUpload extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'file_name','file_path','file_type'];
}
