<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [
        'client_id','product_id','quantity',
    ];

    public function product(){
        return $this->belongsTo('App\product');
    }
}
