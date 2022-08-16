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
            <div class="row px-5 my-2 bg-light">
                <h3 class="my-2">Related Products</h3>

                @forelse($product->category->products as $relatedProduct)

                    @if($product->category->products->count()==1)
                        <div class="col-12">
                            <h5>No Related Products</h5>
                        </div>

                    @else
                        @if($relatedProduct->trending=='0' && $relatedProduct->id!=$product->id )
                            <div class="col-5 col-sm-5 col-md-4 col-lg-4 col-xxl-3 ">
                                <div class="product-card position-relative rounded-1">
                                    <a href="{{url('collections/'.$relatedProduct->category->slug.'/'.$relatedProduct->slug)}}">

                                        <div class="product-card-img">
                                            @if($relatedProduct->quantity>0)
                                                <label class="stock bg-success">In Stock</label>
                                            @else
                                                <label class="stock bg-danger">Out of Stock</label>
                                            @endif
                                            @if($relatedProduct->productImages->count()>0)
                                                <img src="{{asset($relatedProduct->productImages[0]->image)}}"
                                                     alt="{{$relatedProduct->name}}">

                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{$relatedProduct->brand->name}}</p>
                                            <h5 class="product-name">
                                        <span>
                                            {{$relatedProduct->name}}
                                        </span>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{$relatedProduct->selling_price}}</span>
                                                @if($relatedProduct->selling_price!=$relatedProduct->original_price)
                                                    <span class="original-price">${{$relatedProduct->original_price}}</span>
                                                @endif

                                            </div>
                                            <div class="mt-2 ">
                                                    <?php $addedTocart = false ?>
                                                @forelse(\Illuminate\Support\Facades\Auth::user()->carts as $item)
                                                    @if($relatedProduct->id ==$item->product_id)
                                                            <?php $addedTocart = true ?>
                                                    @endif

                                                @empty
                                                @endforelse
                                                @if($addedTocart)
                                                    <a wire:click.prevent="toCart({{$relatedProduct->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                                                       class="btn btn1 "><i class="fa fa-check"></i></a>
                                                @else
                                                    <a wire:click.prevent="toCart({{$relatedProduct->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                                                       class="btn btn1 ">Add To Cart</a>
                                                @endif



                                                    <?php $exists = false ?>
                                                @forelse(\Illuminate\Support\Facades\Auth::user()->favourites as $item)
                                                    @if($relatedProduct->id ==$item->product_id)
                                                            <?php $exists = true ?>
                                                    @endif

                                                @empty
                                                @endforelse
                                                <a  wire:click.prevent="toFavourite({{$relatedProduct->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                                                    class="btn btn1 "> <i
                                                        class="fa fa-heart @if($exists) text-danger @endif "></i> </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endif


                @empty
                    <div class="col-12">
                        No Related Products
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>

</div>

