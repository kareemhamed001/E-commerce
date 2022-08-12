<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favourite extends Model
{
    use HasFactory;
    protected $table="favourites";
    protected $guarded=[];

    function products(){
        return $this->belongsTo(product::class,'product_id','id');
    }
    function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
