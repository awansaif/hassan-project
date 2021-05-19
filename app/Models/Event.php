<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_image',
        'secondary_image',
        'short_description',
        'long_decription',
        'even_price',
        'event_place',
        'event_timing',
        'author_name',
        'federation_name',
        'further_detail',
        'location_map_link',
        'author_image',
        'zip_code',
    ];
}
