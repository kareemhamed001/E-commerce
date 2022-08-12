@extends('layouts.admin')
@section('content')

    <div class="row">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        {{--            @if(session('message'))--}}
        {{--                <div class="alert alert-success">{{session('message')}}</div>--}}
        {{--            @endif--}}

        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="d-flex align-items-center justify-content-between flex-wrap">
                        Edit Products
                        <a class="btn btn-sm btn-danger" href="{{url('admin/products')}}">Back</a>
                    </h3>

                    <div class="card-body">

                        <form method="post" action="{{url('admin/product/'.$product->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tags-tab" data-bs-toggle="tab" data-bs-target="#tags-tab-pane" type="button" role="tab" aria-controls="tags-tab-pane" aria-selected="false">SEO Tags</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Image</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Color</button>
                                </li>

                            </ul>

                            <div class="tab-content py-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label >Category</label>
                                        <select class="form-control" name="category" >
                                            @forelse($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id==$product->category_id?'selected':''}}>{{$category->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label >Product Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label >Product Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                                    </div>

                                    <div class="mb-3">
                                        <label >Brand</label>
                                        <select class="form-control" name="brand">
                                            @forelse($brands as $brand)
                                                <option value="{{$brand->id}}" {{$brand->id==$product->brand_id?'selected':''}}>{{$brand->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label >Small Description</label>
                                        <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label >Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                    </div>


                                </div>

                                <div class="tab-pane fade" id="tags-tab-pane" role="tabpanel" aria-labelledby="tags-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label >Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label >Meta Description</label>
                                        <textarea  name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label >Meta Keyword</label>
                                        <textarea type="text" name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                    <div class="row">

                                        <div class="mb-3 col-md-4">
                                            <label >original_price</label>
                                            <input type="number" name="original_price" class="form-control" value="{{ $product->original_price }}">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label >selling_price</label>
                                            <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label >quantity</label>
                                            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
                                            @error('quantity'){{$message}}@enderror
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label >trending</label>
                                            <input type="checkbox" name="trending" {{ $product->trending==true?'checked':'' }}>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label >status</label>
                                            <input type="checkbox" name="status" {{ $product->status==true?'checked':'' }}>
                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label>Product Image</label>
                                        <input type="file" name="image[]" class="form-control" multiple>
                                        <div>
                                            @if($product->productImages)
                                                <div class="row">
                                                    @foreach($product->productImages as $image)
                                                        <div class="col-md-2">
                                                            <img src="{{asset($image->image)}}" style="width: 80px; height: 80px;" class="me-4" alt="img">
                                                            <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <h5>No Images Added</h5>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                    <div class="mb-3">
                                        <h4>Add Color</h4>
                                        <div class="row">
                                            @forelse($colors as $color)
                                                <div class="col-md-3 p-2 border mb-1">

                                                    Color: <input type="checkbox" name="colors[{{$color->id}}]"
                                                                  value="{{$color->id}}">{{$color->name}}
                                                    <br>
                                                    Quantity: <input type="number" name="colorQuantity[{{$color->id}}]"
                                                                     class="border ">
                                                </div>
                                            @empty
                                                <div class="col-md-12">
                                                    <h2>No Colors found</h2>
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>


{{--                                        @livewire('admin.product.product-color-edit',['product_id'=> $product->id])--}}
                                        <livewire:admin.product.product-color-edit :product_id="$product->id" />

                                </div>

                                </div>


                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



