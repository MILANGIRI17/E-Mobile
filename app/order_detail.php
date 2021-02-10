<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $fillable = [
        'order_id','product_id','quantity','total_price','status',
    ];

    public function order(){
        return $this->belongsTo('App\order');
    }

    public function product(){
        return $this->belongsTo('App\product');
    }
}
