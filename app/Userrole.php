<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userrole extends Model
{
    //
    protected $fillable = ['role'];

    /**
     * Defining relations with 'Users' Model
     *
     *
     */
    public function user()
    {
        $this->hasMany('App\User');
    }
}
