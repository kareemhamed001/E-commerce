<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands
                    </h4>
                </div>
                <div class="card-body">
                    @foreach($category->brands as $brand)
                        <label class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{$brand->id}}">{{$brand->name}}
                        </label>
                    @endforeach

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>
                        Prices
                    </h4>
                </div>
                <div class="card-body">

                        <label class="d-block">
                            <input type="radio" wire:model="priceInput" value="hight-to-low">Hight to Low
                        </label>
                        <label class="d-block">
                            <input type="radio" wire:model="priceInput" value="low-to-hight">Low to Hight
                        </label>


                </div>
            </div>
        </div>


        <div class="col-md-9">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <a href="{{url('collections/'.$product->category->slug.'/'.$product->slug)}}">

                                <div class="product-card-img">
                                    @if($product->quantity>0)
                                        <label class="stock bg-success">In Stock</label>
                                    @else
                                        <label class="stock bg-danger">Out of Stock</label>
                                    @endif
                                    @if($product->productImages->count()>0)
                                        <img src="{{asset($product->productImages[0]->image)}}"
                                             alt="{{$product->name}}">

                                    @endif
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{$product->brand->name}}</p>
                                    <h5 class="product-name">
                                        <a href="">
                                            {{$product->name}}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{$product->selling_price}}</span>
                                        <span class="original-price">${{$product->original_price}}</span>
                                    </div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>
                            No Products Available For {{$category->name}}
                        </h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
