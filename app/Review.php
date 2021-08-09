<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected $fillable = [
        'rate',
        'review',
        'user_id',
        'doctor_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
