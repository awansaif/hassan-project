<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CassificheDetail extends Model
{
    use HasFactory;
    public function cassifiches()
    {
        return $this->belongsTo('App\Models\Cassifiche', 'cassifiche_id');
    }
}
