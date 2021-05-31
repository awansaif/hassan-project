<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'player_name',
        'player_picture',
        'player_role',
        'club_id',
        'club_image',
        'player_favorite_shot',
        'player_favourite_table',
        'sponser_image_one',
        'sponser_image_two',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }

    public function career()
    {
        return $this->hasMany('App\Models\Career');
    }
}
