<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Doctor extends Model
{
    // use Searchable;

    protected $fillable = [
        'doctorName',
        'registrationNo',
        'department_id',
        'educationalDegrees',
        'roomNumber',
        'branch',
        'visitFee',
        'isActiveForScheduling',
        'isRoomCurrentlyOpen',
        'isAvaliableOn',
        'isAvaliableFrom',
        'user_id',
    ];

    public function users ()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function departments()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function review()
    {
        return $this->hasMany('App\Review', 'doctor_id');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appoinment', 'doctor_id');
    }

    // public function searchableAs()
    // {
    //     return 'items_index';
    // }
    
}
