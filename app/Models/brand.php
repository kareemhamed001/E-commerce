<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $guarded=[];

    public function products(){
        return $this->hasMany(product::class,'brand_id','id');
    }
    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
}
