<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name', 'brand','price','display','processor','ram','storage','battery','front_camera','rear_camera','os','image',
    ];

    public function cart(){
        return $this->hasMany('App\cart');
    }
    public function order_detail(){
        return $this->hasMany('App\order_detail');
    }

    public function rate(){
        return $this->hasMany('App\rate');
    }
}
