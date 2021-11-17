<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Helper extends Model
{
    use HasFactory;

    public static function getCategoryFromID($id)
    {
        return Category::where('id', $id)->first()->name;
    }
}