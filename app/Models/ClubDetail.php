<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubDetail extends Model
{
    use HasFactory;
    public function clubs()
    {
        return $this->belongsTo('App\Models\Club', 'club_id');
    }
}
