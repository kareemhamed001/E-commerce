<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\brand;
use App\Models\category;
use App\Models\color;
use Livewire\Component;

class CategoryBrand extends Component
{
    public $category;


    function getBrands($category_id){
        $this->category=$category_id;
    }


    public function render()
    {


        $categories = category::all();
        $brands = brand::where('category_id',$this->category)->get();
        return view('livewire.admin.product.category-brand',compact('categories','brands'));
    }
}
