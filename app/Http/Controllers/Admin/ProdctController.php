<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\ProductsFormRequest;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\product;
use App\Models\productImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProdctController extends Controller
{
    public function index()
    {
        $products = product::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = category::all();
        $brands = brand::all();
        $colors=color::where('status','0')->get();

        return view('admin.product.create', ['categories' => $categories, 'brands' => $brands,'colors'=>$colors]);
    }

    public function store(ProductsFormRequest $request)
    {

        $validatedData = $request->validated();
//        dd($validatedData['category'].','.$validatedData['brand']);
        $category_id = category::find($validatedData['category']);
        $brand_id = category::find($validatedData['brand']);

        $product = product::create([
            'category_id' => $validatedData['category'],
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'brand_id' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request['trending'] ? '1' : '0',
            'status' => $request['status'] ? '1' : '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $i = 0;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $fileName = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $fileName);
                $finalImagePathName = $uploadPath . $fileName;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }


        }

        if ($request->colors){
            foreach ($request->colors as $key => $color){
                $product->productColors()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$color,
                    'quantity'=>$request->colorQuantity[$key]??'0',
                ]);
            }
        }

        return redirect(url('admin/product/create'))->with('message', 'Product Added Successfully');

    }

    public function edit(int $product)
    {
        $categories = category::all();
        $brands = brand::all();

        $product=product::find($product);
        $images = $product->productImages();
        $productColors = $product->productColors()->pluck('color_id')->toArray();
        $colors = color::whereNotIn('id',$productColors)->get();

        return view('admin.product.edit', compact('product', 'categories', 'brands', 'images','colors','product'));
    }

    public function update(ProductsFormRequest $request, $product_id)
    {
        $validatedData = $request->validated();
        $product = category::find($validatedData['category'])->products()->where('id', $product_id)->first();


        if ($product) {
            $product->update([
                'category_id' => $validatedData['category'],
                'name' => $validatedData['name'],
                'slug' => $validatedData['slug'],
                'brand_id' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request['trending'] ? '1' : '0',
                'status' => $request['status'] ? '1' : '0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';

                $i = 0;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $fileName = time() . $i++ . '.' . $extention;
                    $imageFile->move($uploadPath, $fileName);
                    $finalImagePathName = $uploadPath . $fileName;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            if ($request->colors){
                foreach ($request->colors as $key => $color){
                    if ($request->colorQuantity[$key]>=0){
                        $product->productColors()->create([
                            'product_id'=>$product->id,
                            'color_id'=>$color,
                            'quantity'=>$request->colorQuantity[$key]??'0',
                        ]);
                    }

                }
            }

        } else {
            return redirect('admin/products')->with('message', 'No Such Product Id Found');
        }

        return redirect('admin/products')->with('message', 'Updated successfully');

    }

    function updataColorQuantity(Request $request,$color_id){
        $productColorData=product::find($request->product_id)->productColor()->where('id',$color_id)->first();
        $productColorData->update([
            'quantity'=>$request->quantity,
        ]);
        return response()->json(['message'=>'updated']);
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = productImage::find($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();

        return redirect()->back()->with('message', 'Image Deleted Successfully');
    }
}
