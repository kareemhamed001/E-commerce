<?php

namespace App\Http\Livewire\FrontEnd\Cart;

use App\Models\shoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
public $cartQuantity;
    function deleteCart($cartId){
        shoppingCart::find($cartId)->delete();
        $this->emit('refreshNavBar');
    }

    function cartQuantity($quantity){
        $this->cartQuantity=$quantity;
    }

    function updateCart($cart_id){
        $cart=shoppingCart::find($cart_id);
        $product=$cart->product()->first();

        if ($this->cartQuantity &&$this->cartQuantity>0){
            if ($this->cartQuantity<=$product->quantity){
                $cart->update([
                    'quantity'=>$this->cartQuantity,
                ]);
                session()->flash('success','Updated');
            }else{
                session()->flash('error','Not enough quantity');
            }
        }else{
            session()->flash('error','Not valid');
        }
    }

    public function render()
    {
        $carts=Auth::user()->carts()->get();
        return view('livewire.front-end.cart.index',compact('carts'))->extends('layouts.app')->section('content');
    }
}
