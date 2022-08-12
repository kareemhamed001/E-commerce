<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $validatedData=$request->validated();

        if ($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/category',$fileName);
        }

        category::create([
            'name'             =>$validatedData['name']                    ,
            'slug'             =>Str::slug($validatedData['slug'])         ,
            'description'      =>$validatedData['description']             ,
            'image'            =>isset($fileName)?$fileName:''             ,
            'meta_title'       =>$validatedData['meta_title']              ,
            'meta_description' =>$validatedData['meta_description']        ,
            'meta_keyword'     =>$validatedData['meta_keyword']            ,
            'status'           =>$request['status']==true?'1':'0'          ,
        ]);
        return redirect('admin/category')->with('message','Added successfully');
    }

    public function edit(category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request,$category)
    {
        $validatedData=$request->validated();

        $category=category::findOrFail($category);

        $category->name             =$validatedData['name']             ;
        $category->slug             =Str::slug($validatedData['slug'])  ;
        $category->description      =$validatedData['description']      ;

        if ($request->hasFile('image')){
            $path='uploads/category'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/category',$fileName);
            $category->image            =$fileName;
        }

            $category->meta_title       =$validatedData['meta_title']       ;
            $category->meta_description =$validatedData['meta_description'] ;
            $category->meta_keyword     =$validatedData['meta_keyword']     ;
            $category->status           =$request['status']==true?'1':'0'   ;
            $category->update();

        return redirect('admin/category')->with('message','Updated successfully');
    }
}
