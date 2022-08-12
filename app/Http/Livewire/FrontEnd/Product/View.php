<?php

namespace App\Http\Livewire\FrontEnd\Product;

use App\Models\productColor;
use Livewire\Component;

class View extends Component
{
    public $product,$category,$productColorSelectedQuantity,$product_quantity=0,$color_selected;
    public function render()
    {
        return view('livewire.front-end.product.view',['product'=>$this->product,'category'=>$this->category]);
    }

    function mount($product,$category){
        $this->product=$product;
        $this->category=$category;
    }

    function increment(){
        $this->product_quantity++;
    }
    function decrement(){
        if ($this->product_quantity>0)
            $this->product_quantity--;
    }

    function colorSelected($colorId){
//       $productColor =productColor::findOrFail($colorId);
        dd($this->color_selected);
        $productColorSelected=$this->product->productColors()->where('id',$colorId)->first();
        $this->productColorSelectedQuantity=$productColorSelected->quantity;
        if ($this->productColorSelectedQuantity==0){
            $this->productColorSelectedQuantity='OutOfStock';
        }else{
            $this->productColorSelectedQuantity='InStock';
        }
    }
}
