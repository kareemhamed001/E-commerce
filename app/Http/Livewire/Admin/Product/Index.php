<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\product;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\True_;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $product_id;
    public $delete_All=false;

    function deleteProduct($id){

        $this->product_id=$id;
    }

    function deleteAll(){
        $this->delete_All=true;
        $this->emit('refreshIndexPage');
    }

    function destroyProduct(){
        if ($this->delete_All==true){
            DB::statement("SET foreign_key_checks=0");
            product::truncate();
            $this->deleteAll=false;
            session()->flash('message','All products Deleted');
            $this->emit('refreshIndexPage');
            $this->dispatchBrowserEvent('close-modal');

        }else{
            $product= product::find($this->product_id);
            $product->delete();
            session()->flash('message','product Deleted');
            $this->emit('refreshIndexPage');
            $this->dispatchBrowserEvent('close-modal');

            $this->product_id='';
        }
    }

    public function render()
    {
        $products=product::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.product.index',['products'=>$products])->extends('layouts.admin')->section('content');
    }

}
