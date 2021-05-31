<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FederationMovement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'icon',
        'image',
        'latest_event',
        'club_id'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
}
