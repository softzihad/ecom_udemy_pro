<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_name_bng',
        'subsubcategory_slug_en',
        'subsubcategory_slug_bng',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory','subcategory_id','id');
    }
}
