<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_one_image',
        'team_one_name',
        'team_two_image',
        'team_two_name',
        'current_set_score',
    ];

    public $hidden = [
        'created_at',
        'updated_at',

    ];

    public function scores()
    {
        return $this->hasMany(LiveScore::class);
    }
}
