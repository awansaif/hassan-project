<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'product_images',
        'product_name',
        'product_size',
        'product_description',
        'product_old_price',
        'product_new_price',
        'category',
        'product_colour',
    ];

    public function shops()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }
}
