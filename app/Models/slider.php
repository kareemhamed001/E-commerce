<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $table='sliders';
    protected $guarded=[];
    function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
}
