<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkOrder extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'link_id',
        'payment',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
