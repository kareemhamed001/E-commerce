<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Requests\ProductsFormRequest;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\product;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $categories = category::all();
        $brands = brand::all();
        $colors=color::where('status','0')->get();
        return view('livewire.admin.product.create',compact('categories','brands','colors'))->extends('layouts.admin')->section('content');

    }

    function store(ProductsFormRequest $request){
        return $request;
    }
}
