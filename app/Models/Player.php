<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function countries()
    {
    	return $this->belongsTo('App\Models\Country', 'country_id');
    }

     public function career()
    {
    	return $this->hasMany('App\Models\Career');
    }
}
