<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClubClassification extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'club_id',
        'name',
        'citta',
        'regione',
        'serie_a',
        'serie_b',
        'serie_c',
        'volo',
        'trad',
        'ball',
        'italia',
        'champian_cup',
        'trofee'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
}
