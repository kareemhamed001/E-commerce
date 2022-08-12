<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\color;
use http\Env\Request;

class ColorController extends Controller
{
    function index(){
        $colors=color::paginate(10);
        return view('admin.colors.index',compact('colors'));
    }

    function create(){
        return view('admin.colors.create');
    }

    function store(ColorFormRequest $request){
        $validated=$request->validated();
        color::create([
            'name'=>$validated['name'],
            'code'=>$validated['code'],
            'status'=>$request->status?'1':'0',
        ]);
        return redirect()->back()->with('message','Color Added Successfully');
    }

    function edit(color $color){
        return view('admin.colors.edit',compact('color'));
    }

    function update(ColorFormRequest $request, $color_id){
        $validated=$request->validated();


        color::find($color_id)->update([
            'name'=>$validated['name'],
            'code'=>$validated['code'],
            'status'=>$request->status?'1':'0',
        ]);

        return redirect('admin/colors')->with('message','Color Update Successfully');
    }

    function destroy($color_id){
        $color=color::findOrFail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message','Color deleted successfully');
    }
}
