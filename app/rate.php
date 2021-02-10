<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected $fillable = [
        'user_id','product_id','rate',
    ];

    public function product(){
        return $this->belongsTo('App\product');
    }
}
