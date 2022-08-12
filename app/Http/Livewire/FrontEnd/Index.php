<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\category;
use App\Models\favourite;
use App\Models\product;
use App\Models\slider;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    function test(){
        dd('test');
    }

    function toFavourite($product_id,$user_id){
        $product=product::find($product_id);
        $user=User::find($user_id);
        if ($product && $user){
            $favItem=favourite::create([
                'user_id'=>$user_id,
                'product_id'=>$product_id,
            ]);
            $this->dispatchBrowserEvent('done-modal');
        }
    }

    function toCart($product_id,$user_id)
    {
        dd($product_id);
    }
    public function render()
    {
        $categories=category::orderBy('updated_at','desc')->get();
        return view('livewire.front-end.index',compact('categories'));
    }
}
