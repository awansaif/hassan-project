<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'price',
        'date'
    ];

    public function products()
    {
       return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function users()
    {
       return $this->belongsTo('App\Models\User', 'user_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
