<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'departmentName'
    ];

    public function doctors()
    {
        return $this->hasOne('App\Doctor');
    }
     public function users()
    {
        return $this->hasOne('App\Doctor');
    }
}
