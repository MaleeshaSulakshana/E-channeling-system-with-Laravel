<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    protected $fillable = [
        'appointmentNumber',
        'appointmentDate',
        'scheduledTime',
        'isCurrentlyActive',
        'isbooked',
        'isCancelled',
        'user_id',
        'doctor_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

}
