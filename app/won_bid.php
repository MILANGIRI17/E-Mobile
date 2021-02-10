<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class won_bid extends Model
{
    protected $fillable = [
        'name','client_id','brand','price','display','processor','ram','storage','battery','front_camera','rear_camera','os','image',
    ];

    public function client(){
        return $this->belongsTo('App\User');
    }
}
