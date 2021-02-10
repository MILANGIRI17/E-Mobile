<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bid extends Model
{
    protected $fillable = [
        'name', 'brand','price','display','processor','ram','storage','battery','front_camera','rear_camera','os','image',
    ];

}
