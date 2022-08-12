<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\color;
use App\Models\product;
use App\Models\productColor;
use Livewire\Component;

class ProductColorEdit extends Component
{
    public $product_id;
    public $colorQuantity=0;

    public function changeQuantity($value){
        $this->colorQuantity=$value;
    }

    public function updateProductColorQuantity($color_id){

            $product=product::findOrFail($this->product_id);
            $productColor=productColor::findOrFail($color_id);
            $productColor->update([
                'quantity'=>$this->colorQuantity,
            ]);


        $this->colorQuantity=0;
    }

    public function destroy($id)
    {
        $product_color=productColor::find($id);
        $product_color->delete();
        session('message','deleted');

    }

    public function render()
    {


        $product=product::find($this->product_id);
        $productColors = $product->productColors()->pluck('color_id')->toArray();
        $colors = color::whereNotIn('id',$productColors)->get();

        return view('livewire.admin.product.product-color-edit',compact('product','colors'))->extends('admin.product.edit')->section('component');
    }


}
