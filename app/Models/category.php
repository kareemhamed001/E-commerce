<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $guarded=[];

    public function products(){
        return $this->hasMany(product::class,'category_id','id');
    }
    public function brands(){
        return $this->hasMany(brand::class,'category_id','id')->where('status','0');
    }
}
