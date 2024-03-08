<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'code',
            'unit',
            'brand_id',
            'childcategory_id',
            'category_id',
            'subcategory_id',
            'tags',
            'purchase_price',
            'selling_price',
            'discount_price',
            'stock_quantity',
            'warehouse',
            'description',
            'thumbnail',
            'images',
            'video',
            'featured',
            'today_deal',
            'flash_deal_id',
            'status',
            'cash_on_delivery',
            'admin_id',
        ];
}
