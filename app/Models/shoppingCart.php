<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoppingCart extends Model
{
    use HasFactory;
    protected $guarded=[];

    function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }
    function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
