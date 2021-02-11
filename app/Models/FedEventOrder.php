<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FedEventOrder extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'event_id',
        'user_id',
        'price',
        'payment_id',
        'date'
    ];

    public function events()
    {
       return $this->belongsTo('App\Models\FederationEvent', 'event_id');
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
