<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        $sliders=slider::where('status','0')->get();
        $categories=category::where('status','0')->limit(10)->get();
        return view('frontend.index',compact('sliders','categories'));
    }

    function categories(){
        $categories=category::where('status','0')->paginate(10);
        return view('frontend.collections.category.index',compact('categories'));
    }

    function products($category_slug){
        $category=category::where('slug',$category_slug)->first();
        if ($category){
            $categories=category::where('status','0')->paginate(10);

            return view('frontend.collections.products.index',compact('categories','category'));
        }else{
            return redirect()->back();
        }
    }
    function productView($category_slug,$product_slug){
        $category=category::where('slug',$category_slug)->first();
        if ($category){
            $product=$category->products->where('status','0')->where('slug',$product_slug)->first();
            if ($product){
                $categories=category::where('status','0')->paginate(10);
                return view('frontend.collections.products.view',compact('categories','product','category'));
            }else{
                return redirect()->back();
            }

        }else{
            return redirect()->back();
        }
    }
}
