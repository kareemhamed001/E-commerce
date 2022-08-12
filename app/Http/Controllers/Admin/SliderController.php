<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderEditFormRequest;
use App\Http\Requests\SliderFormRequest;
use App\Models\category;
use App\Models\slider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    function index(){
        $sliders=slider::paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }
    function create(){

        $categories=category::all();
        return view('admin.slider.create',compact('categories'));
    }
    function store(SliderFormRequest $request){
        $validatedData=$request->validated();
        $slider=new slider();
        $slider->title=$validatedData['title'];
        $slider->description=$validatedData['description'];
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/sliders',$fileName);
            $finalPath='uploads/sliders/'.$fileName;
            $slider->image=$finalPath;
        }

        $slider->status=$request->status==true?'1':'0';
        $slider->category_id=$request->category;
        $slider->save();


        session()->flash('message','Slider Added Successfully');
        return redirect()->back();
    }

    function edit($id){
        $slider=slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    function update(SliderEditFormRequest $request,$id){
        $validatedData=$request->validated();

        $slider=slider::findOrFail($id);

        $slider->title             =$validatedData['title']             ;
        $slider->description      =$validatedData['description']      ;

        if ($request->hasFile('image')){
            $path=$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/sliders',$fileName);
            $slider->image            ='uploads/sliders/'.$fileName;
        }
        $slider->status           =$request->status?'1':'0'   ;
        $slider->update();

        return redirect('admin/sliders')->with('message','Updated successfully');
    }
}
