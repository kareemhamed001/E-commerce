<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\category;
use App\Models\favourite;
use App\Models\product;
use App\Models\shoppingCart;
use App\Models\slider;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    protected $listeners=['refreshIndexPage'=>'$refresh'];

    public $product_quantity=1;

    function test(){
        dd('test');
    }

    function toFavourite($product_id,$user_id){
        $product=product::find($product_id);
        $user=User::find($user_id);
        $item=favourite::where('product_id',$product_id)->where('user_id',$user_id)->first();


        if ($item){
            $item->delete();
            $this->emit('refreshNavBar');
        }else{
            if ($product && $user){
                $favItem=favourite::create([
                    'user_id'=>$user_id,
                    'product_id'=>$product_id,
                ]);
                $this->emit('refreshNavBar');
            }
        }

    }

    function toCart($product_id,$user_id)
    {
        $product=product::find($product_id);
        $user=User::find($user_id);
        $item=shoppingCart::where('product_id',$product_id)->where('user_id',$user_id)->first();
        if ($item){
            $item->delete();
            $this->emit('refreshNavBar');
        }else{
            if ($product && $user){
                if ($product->quantity>$this->product_quantity){
                    $favItem=shoppingCart::create([
                        'user_id'=>$user_id,
                        'product_id'=>$product_id,
                        'quantity'=>$this->product_quantity,
                    ]);
                    $this->emit('refreshNavBar');
                    $this->dispatchBrowserEvent('done-modal');
                }

            }
        }

    }



    function deleteFav($itemId){
        $fav=favourite::where('id',$itemId)->delete();
    }

    function openFav(){
        $this->dispatchBrowserEvent('open-favBar');
    }
    function closeFav(){
        $this->dispatchBrowserEvent('close-favBar');
    }


    public function render()
    {
        $categories=category::where('status','0')->limit(10)->orderBy('updated_at','desc')->get();
        $sliders=slider::where('status','0')->get();
        return view('livewire.front-end.index',compact('categories','sliders'))->extends('layouts.app')->section('content');
    }
}
