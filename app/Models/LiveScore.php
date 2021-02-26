<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveScore extends Model
{
    use HasFactory;


    public function teams()
    {
        return $this->belongsTo('App\Models\Team', 'team_id');
    }
}
