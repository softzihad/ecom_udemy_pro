<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_name_bng',
        'subcategory_slug_en',
        'subcategory_slug_bng',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
