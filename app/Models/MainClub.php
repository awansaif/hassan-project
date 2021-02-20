<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainClub extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by',
        'club_name',
    ];

    public function clubs()
    {
        return $this->hasMany('App\Models\Club', 'club_id');
    }
}
