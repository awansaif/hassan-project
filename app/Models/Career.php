<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'nation_icon',
        'tounament_year',
        'tournament_name',
        'sport_movement',
        'player_position',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
