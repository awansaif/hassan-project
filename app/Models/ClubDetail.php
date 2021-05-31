<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id',
        'sponsor_images',
        'image',
        'name',
        'description',
        'location',
        'table_chara',
    ];
    public function clubs()
    {
        return $this->belongsTo('App\Models\Club', 'club_id');
    }
}
