<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidding extends Model
{
    protected $fillable = [
        'bid_id','user_id','bid_price',
    ];
    public function bid(){
        return $this->belongsTo('App\bid');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
