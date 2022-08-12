<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\brand;

use App\Models\category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\Null_;

class Index extends Component
{
    use WithPagination;

    public $name, $slug, $status, $brand_id,$category_id;
    public $delete_All=false;

    public function rules()
    {
        return [
            'name' => 'required|string|max:254',
            'slug' => 'required|string|max:254',
            'category_id' => 'required|integer',
            'status' => 'nullable',
        ];
    }

    public function emptyFields()
    {
        $this->name = Null;
        $this->slug = Null;
        $this->status =Null ;
        $this->brand_id = Null;
        $this->delete_All = false;
        $this->category_id = Null;

    }

    public function closeModal()
    {
        $this->emptyFields();
    }

    public function openModal()
    {
        $this->emptyFields();
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();
        brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
            'category_id'=>$this->category_id,
        ]);

        session()->flash('message', 'brand Added Successfuly');
        $this->dispatchBrowserEvent('close-modal');
        $this->emptyFields();
    }

    public function editBrand(int $brand_id)
    {
        $brand = brand::findOrFail($brand_id);
        $this->brand_id=$brand_id;
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;

    }

    public function updateBrand()
    {
        $validatedData = $this->validate();
        brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
            'category_id'=>$this->category_id,
        ]);

        session()->flash('message', 'brand Updated Successfuly');
        $this->dispatchBrowserEvent('close-modal');
        $this->emptyFields();
    }

    function deleteBrand($id){

        $this->brand_id=$id;
    }

    function destroyBrand(){
        if ($this->delete_All==true){
            brand::truncate();
            $this->deleteAll=false;
            session()->flash('message','All Brands Deleted');
            $this->dispatchBrowserEvent('close-modal');
            $this->emptyFields();
        }else{
            $brand= brand::find($this->brand_id);

            $brand->delete();
            session()->flash('message','brand Deleted');
            $this->dispatchBrowserEvent('close-modal');
            $this->emptyFields();
        }


    }



    public function render()
    {
        $categories=category::where('status','0')->get();
        $brands = brand::orderBy('id', 'desc')->simplepaginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands,'categories'=>$categories])
            ->extends('layouts.admin')->section('content');
    }
}
