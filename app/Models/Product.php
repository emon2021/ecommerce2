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
        'color',
        'size',
        'pickup_point_id',
    ];

    //______relation with category model_______
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    //______relation with subcategory model_______
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
    //______relation with childcategory model_______
    public function childcategory()
    {
        return $this->belongsTo(ChildCategory::class,'childcategory_id');
    }
    //______relation with brand model_______
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    //______relation with pickup point model_______
    public function pickuppoint()
    {
        return $this->belongsTo(PickupPoint::class,'pickup_point_id');
    }
    //______relation with warehouse model_______
    public function warehouse()
    {
        return $this->belongsTo(WareHouse::class,'warehouse');
    }
    //______relation with user model_______
    public function user()
    {
        return $this->belongsTo(User::class,'admin_id');
    }
    //______relation with review model_______
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
