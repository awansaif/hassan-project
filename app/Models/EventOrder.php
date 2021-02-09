<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'user_id',
        'price',
        'date'
    ];

    public function events()
    {
       return $this->belongsTo('App\Models\Event', 'event_id');
    }

    public function users()
    {
       return $this->belongsTo('App\Models\User', 'user_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
