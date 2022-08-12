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
                        Add Products
                        <a class="btn btn-sm btn-danger" href="{{url('admin/products')}}">Back</a>
                    </h3>

                    <div class="card-body">

                        <form method="post" action="{{url('admin/products')}}" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home-tab-pane" type="button" role="tab"
                                            aria-controls="home-tab-pane" aria-selected="true">Home
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tags-tab" data-bs-toggle="tab"
                                            data-bs-target="#tags-tab-pane" type="button" role="tab"
                                            aria-controls="tags-tab-pane" aria-selected="false">SEO Tags
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                            data-bs-target="#details-tab-pane" type="button" role="tab"
                                            aria-controls="details-tab-pane" aria-selected="false">Details
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                            data-bs-target="#image-tab-pane" type="button" role="tab"
                                            aria-controls="image-tab-pane" aria-selected="false">Image
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                            data-bs-target="#color-tab-pane" type="button" role="tab"
                                            aria-controls="color-tab-pane" aria-selected="false">Colors
                                    </button>
                                </li>

                            </ul>

                            <div class="tab-content py-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                     aria-labelledby="home-tab" tabindex="0">
                                    <livewire:admin.product.category-brand/>

                                    <div class="mb-3">
                                        <label>Product Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Product Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                                    </div>



                                    <div class="mb-3">
                                        <label>Small Description</label>
                                        <textarea name="small_description" class="form-control"
                                                  rows="4">{{ old('small_description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control"
                                                  rows="4">{{ old('description') }}</textarea>
                                    </div>


                                </div>
                                <div class="tab-pane fade" id="tags-tab-pane" role="tabpanel" aria-labelledby="tags-tab"
                                     tabindex="1">
                                    <div class="mb-3">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                               value="{{ old('meta_title') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" class="form-control"
                                                  rows="4">{{ old('meta_description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Keyword</label>
                                        <textarea type="text" name="meta_keyword" class="form-control"
                                                  rows="4">{{ old('meta_keyword') }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel"
                                     aria-labelledby="details-tab" tabindex="2">
                                    <div class="row">

                                        <div class="mb-3 col-md-4">
                                            <label>original_price</label>
                                            <input type="number" name="original_price" class="form-control"
                                                   value="{{ old('original_price') }}">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>selling_price</label>
                                            <input type="number" name="selling_price" class="form-control"
                                                   value="{{ old('selling_price') }}">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>quantity</label>
                                            <input type="text" name="quantity" class="form-control"
                                                   value="{{ old('quantity') }}">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>trending</label>
                                            <input type="checkbox"
                                                   name="trending" {{ old('trending')==true?'checked':'' }}>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>status</label>
                                            <input type="checkbox" name="status" {{ old('status')==true?'checked':'' }}>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="image-tab-pane" role="tabpanel"
                                     aria-labelledby="image-tab" tabindex="3">
                                    <div class="mb-3">
                                        <label>Product Image</label>
                                        <input type="file" name="image[]" class="form-control" multiple>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="color-tab-pane" role="tabpanel"
                                     aria-labelledby="color-tab" tabindex="4">
                                    <div class="mb-3">

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

