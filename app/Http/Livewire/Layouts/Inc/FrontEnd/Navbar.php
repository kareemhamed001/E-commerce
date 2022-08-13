<?php

namespace App\Http\Livewire\Layouts\Inc\FrontEnd;

use App\Models\category;
use App\Models\favourite;
use App\Models\product;
use App\Models\User;
use Livewire\Component;

class Navbar extends Component
{
    protected $listeners=['refreshNavBar'=>'$refresh'];


//    function toFavourite($product_id,$user_id){
//        $product=product::find($product_id);
//        $user=User::find($user_id);
//        if ($product && $user){
//            $favItem=favourite::create([
//                'user_id'=>$user_id,
//                'product_id'=>$product_id,
//            ]);
//            $this->dispatchBrowserEvent('done-modal');
//        }
//    }

    function deleteFav($itemId){
        $fav=favourite::where('id',$itemId)->delete();
        $this->emit('refreshIndexPage');
        $this->emit('refreshViewPage');
    }

    function openFav(){
        $this->dispatchBrowserEvent('open-favBar');
    }
    function closeFav(){
        $this->dispatchBrowserEvent('close-favBar');
    }


    public function render()
    {
        $categories=category::limit(10)->get();
        $favourites=favourite::all();
        return view('livewire.layouts.inc.front-end.navbar',compact('categories','favourites'));
    }
}
