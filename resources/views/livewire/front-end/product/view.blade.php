<div>
    <div class="py-3 py-md-5  bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border d-flex flex-column justify-content-center align-items-center h-100">

                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

                            <div class="carousel-inner">

                                @foreach($product->productImages as $key =>$slider)
                                    <div class="carousel-item {{$key==0?'active':''}}">
                                        <img src="{{asset($slider->image)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}

                            @if($product->quantity>0)
                                <label class="label-stock bg-success">In Stock</label>
                            @else
                                <label class="label-stock bg-danger">Out of Stock</label>
                            @endif


                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">${{$product->selling_price}}</span>
                            <span class="original-price">${{$product->original_price}}</span>
                        </div>

                        <div>

                            @if($product->productColors->count()>0)
                                @if($product->productColors)

                                    @foreach($product->productColors as $key => $color)
                                        <input type="radio" value="{{$color->id}}" id="radio{{$key}}"  @if($key==0) checked @endif wire:model="color_selected">
{{--                                        <input type="radio"  value="{{$color->id}}"    @if($key==0) checked @endif>--}}
                                        <label for="radio{{$key}}">{{$color->color->name}}</label>

                                    @endforeach

                                @endif
                                @if($productColorSelectedQuantity=='OutOfStock')
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @elseif($this->productColorSelectedQuantity=='InStock')
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @endif
                            @else
                                @if($product->quantity>0)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @endif
                            @endif
                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <button class="btn btn1" wire:click="decrement()"><i class="fa fa-minus"></i></button>
                                <input type="text" value="{{$product_quantity}}" class="input-quantity"
                                       wire:model="product_quantity"/>
                                <button class="btn btn1" wire:click="increment()"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a wire:click="toCart({{$product->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                               class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>


                            <?php $exists = false ?>
                            @forelse(\Illuminate\Support\Facades\Auth::user()->favourites as $item)
                                @if($product->id ==$item->product_id)
                                        <?php $exists = true ?>
                                @endif

                            @empty
                            @endforelse
                            <a wire:click.prevent="toFavourite({{$product->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                               class="btn btn1"> <i
                                    class="fa fa-heart @if($exists) text-danger @endif "></i> </a>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {!!$product->small_description!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

