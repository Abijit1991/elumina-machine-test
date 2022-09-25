<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $fillable = [
        'status', 'class'
    ];

    public function customer()
    {
        return $this->hasOne('App\Customer');
    }
}
