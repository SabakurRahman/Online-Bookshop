<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //


    protected $fillable = [
        'name', 'address', 'phone','zip',
    ];

     protected $hidden = [
        'remember_token',
    ];
}
