<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_en',
        'category_name_bng',
        'category_slug_en',
        'category_slug_bng',
        'category_icon',
    ];

    public function subcategories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }
}
