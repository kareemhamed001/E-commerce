@extends('layouts.app')
@section('content')

    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <h3>Results</h3>
            </div>
        </div>
        <div class="card-body ">
            @if($products)

                @forelse($products as $product)
                    {{--                    <div class="col-5 col-sm-5 col-md-4 col-lg-4 col-xxl-3 " style="height: 20rem">--}}
                    {{--                        <div class="product-card position-relative rounded-1 h-100" >--}}
                    {{--                            <a class="h-100" href="{{url('collections/'.$product->category->slug.'/'.$product->slug)}}">--}}

                    {{--                                <div class="product-card-img">--}}
                    {{--                                    @if($product->quantity>0)--}}
                    {{--                                        <label class="stock bg-success">In Stock</label>--}}
                    {{--                                    @else--}}
                    {{--                                        <label class="stock bg-danger">Out of Stock</label>--}}
                    {{--                                    @endif--}}
                    {{--                                    @if($product->productImages->count()>0)--}}
                    {{--                                        <img src="{{asset($product->productImages[0]->image)}}"--}}
                    {{--                                             alt="{{$product->name}}">--}}

                    {{--                                    @endif--}}
                    {{--                                </div>--}}
                    {{--                                <div class="product-card-body">--}}
                    {{--                                    <p class="product-brand">{{$product->brand->name}}</p>--}}
                    {{--                                    <h5 class="product-name">--}}
                    {{--                                        <span>--}}
                    {{--                                            {{$product->name}}--}}
                    {{--                                        </span>--}}
                    {{--                                    </h5>--}}
                    {{--                                    <div>--}}
                    {{--                                        <span class="selling-price">${{$product->selling_price}}</span>--}}
                    {{--                                        @if($product->selling_price!=$product->original_price)--}}
                    {{--                                            <span class="original-price">${{$product->original_price}}</span>--}}
                    {{--                                        @endif--}}

                    {{--                                    </div>--}}

                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}




                    <div class=" bg-light d-flex " style="height: 15rem">

                        <a href="{{url('collections/'.$product->category->slug.'/'.$product->slug)}}"
                           class="col-3 p-0 h-100 ">
                            <img class="img-fluid h-100" src="{{$product->productImages[0]->image}}" alt=""
                                 style="object-fit: scale-down">
                        </a>

                        <div class="w-100 mx-2 overflow-hidden">
                            <div class="position-relative overflow-hidden w-100 h-100">
                                <a href="{{url('collections/'.$product->category->slug.'/'.$product->slug)}}"
                                   class="text-decoration-none">
                                    <h3>{{$product->name}}</h3>
                                </a>
                                <p class="my-1 text-break mh-40 overflow-auto text-muted font-size-0 ">{{$product->description}}</p>
                                <p class="my-1 ">color: {{$product->productColors->count()}}</p>
                                <p class="my-1">price: {{$product->selling_price}} $</p>
                                <p class="my-1">quantity: {{$product->quantity}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @empty
                    <div class="col-12"><h4>No Data</h4></div>
                @endforelse
            @endif
        </div>
    </div>

@endsection
