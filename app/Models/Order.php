<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'email',
        'phone',
        'country_name',
        'stripe_card',
        'company_name',
        'address',
        'city',
        'state',
        'postcode',
        'payment_method',
        'payment_status',
        'notes',
        'ship_country' ,
        'ship_name',
        'ship_email',
        'ship_phone',
        'ship_address',
        'ship_city',
        'ship_state',
        'ship_postcode',
        'ship_company_name',
                
    ];
}
