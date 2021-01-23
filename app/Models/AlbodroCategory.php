<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbodroCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    

    public function federations()
    {
        return $this->belongsTo('App\Models\FederationMovement', 'federation_id');
    }
    
    public function items()
    {
        return $this->hasMany(AlbodroItem::class, 'albodro_id');
    }
}
