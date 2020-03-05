<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'is_premium','photo_id','password','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roll()
{
    return $this->belongsTo('App\Roll', 'role_id');
}
 public function photo()
{
    return $this->belongsTo('App\Photos', 'photo_id');
}
}
