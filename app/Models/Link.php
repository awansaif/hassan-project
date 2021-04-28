<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'link',
        'is_paid',
        'price'
    ];

    public $hidden = [
        'created_at',
        'updated_at'
    ];
}
