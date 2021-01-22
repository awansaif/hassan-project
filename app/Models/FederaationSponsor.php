<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederaationSponsor extends Model
{
    use HasFactory;
    public function federations()
    {
        return $this->belongsTo('App\Models\FederationMovement', 'federation_id');
    }
}
