<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;

    //___fillable variable___
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_name',
        'childcategory_slug',
    ];

    //____creating relation with category model___
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    //____creating relation with subcategory model___
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }



}
