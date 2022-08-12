<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\product;
use App\Models\slider;
use Livewire\Component;

class Index extends Component
{
    public $slider_id;
    function delete_slider($id){

        $this->slider_id=$id;
    }
    public function destroy_slider(){


        $slider=slider::find($this->slider_id);
        $slider->delete();
        session()->flash('message','Slider Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {

        $sliders=slider::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.slider.index',['sliders'=>$sliders])->extends('layouts.admin')->section('content');

//        return view('livewire.admin.slider.index');
    }
}
