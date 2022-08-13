<?php

namespace App\Http\Livewire\FrontEnd\Product;

use App\Models\favourite;
use App\Models\product;
use App\Models\productColor;
use App\Models\shoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $product,$category,$productColorSelectedQuantity,$product_quantity=0,$color_selected;
    protected $listeners=['refreshViewPage'=>'$refresh'];

    public function render()
    {
        return view('livewire.front-end.product.view',['product'=>$this->product,'category'=>$this->category]);
    }

    function mount($product,$category){
        $this->product=$product;
        $this->category=$category;
        $this->color_selected=$product->productColors()->first()->id;
        $cartItem=shoppingCart::where('product_id',$product->id)->where('user_id',Auth::user()->id)->first();

        if ($cartItem){
            $this->product_quantity=$cartItem->quantity;
        }


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
            if ($product->quantity>=$this->product_quantity){
                $item->update([
                    'quantity'=> intval($this->product_quantity),
                ]);
                $this->emit('refreshNavBar');
                $this->emit('refreshNavBar');
            }

        }else{
            if ($product && $user){
                if ($product->quantity>=$this->product_quantity){
                    $favItem=shoppingCart::create([
                        'user_id'=>$user_id,
                        'product_id'=>$product_id,
                        'quantity'=>$this->product_quantity,
                        'color_id'=>$this->color_selected,
                        'price_per_one'=>$product->selling_price,
                    ]);
                    $this->emit('refreshNavBar');
                    $this->dispatchBrowserEvent('done-modal');
                }

            }
        }

    }

}
