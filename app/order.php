<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'client_id',
    ];

    public function order_detail(){
        return $this->hasMany('App\order_detail');
    }

    public function client(){
        return $this->belongsTo('App\User');
    }
}
