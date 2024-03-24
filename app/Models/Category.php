<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //__fillable__//
    protected $fillable = [
        'category_name','category_slug',
    ];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
    public function childcategory()
    {
        return $this->hasMany(ChildCategory::class, 'category_id');
    }
}
