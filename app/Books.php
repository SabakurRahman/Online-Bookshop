<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //
     protected $fillable = [
        'image_path', 'title', 'description','price'
    ];
}
