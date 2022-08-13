<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $guarded=[];

    public function productImages()
    {
        return $this->hasMany(productImage::class,'product_id','id');
    }
    public function productColors()
    {
        return $this->hasMany(productColor::class,'product_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(brand::class,"brand_id",'id');
    }
    public function category()
    {
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function carts(){
        return $this->belongsTo(shoppingCart::class,'product_id','id');
    }
    public function favourites(){
        return $this->belongsTo(favourite::class,'product_id','id');
    }
}
