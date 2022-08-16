<div>
        <section class="w-100 p-0">
            <div class="overflow-hidden  vh-md-100 vh-lg-100 vh-sm-100" >
                <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="false">

                    <div class="carousel-inner h-100">

                        @foreach($sliders as $key =>$slider)
                            <div class="carousel-item h-100 {{$key==0?'active':''}}">
                                <img src="{{asset($slider->image)}}" class="d-block h-100 w-100" alt="..."
                                     style="object-fit: cover">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="custom-carousel-content">
                                        <h1>
                                            {{$slider->title}}
                                        </h1>
                                        <p>
                                            {{$slider->description}}
                                        </p>
                                        <div>
                                            <a href="{{url('collections/'.$slider->category->slug)}}"
                                               class="btn btn-slider">
                                                More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded p-1 btn" aria-hidden="true"></span>
{{--                        <span class="visually-hidden">Previous</span>--}}
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded p-1 btn" aria-hidden="true"></span>
{{--                        <span class="visually-hidden">Next</span>--}}
                    </button>
                </div>
            </div>
        </section>

        <section class=" container py-3  page-section " id="categories">
            <div class="text-center position-relative">
                <h3 class="section-heading text-uppercase">Categories</h3>
                <h3 class="section-subheading text-muted"></h3>
                {{--        <a class="btn btn-primary position-absolute top-100   end-0 " href="seeMore.php?projects=1"> <?php echo ($tellMeMore); ?> <span class="fa fa-arrow-right"></span></a>--}}
            </div>

            <div class="row">
                @forelse($categories as $category)
                    <div class="col-6 col-md-3">
                        <div class="category-card" style="height: 12rem;">
                            <a href="{{url('collections/'.$category->slug)}}">
                                <div class="category-card-img">
                                    <img src="{{asset('uploads/category/'.$category->image)}}" class="w-100"
                                         alt="Laptop">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{$category->name}}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>
                            No Categories
                        </h5>
                    </div>
                @endforelse
            </div>
        </section>

        @forelse($categories as $category)
            @if($category->products->count()>0)

                <section class=" container py-3   product_section">
                    <div class=" position-relative">
                        <h3 class="section-heading text-uppercase">{{$category->name}}</h3>
                        <h3 class="section-subheading text-muted"></h3>
                    </div>

                    <div class="row overflow-auto row-cols-lg-auto flex-nowrap">


                        @forelse($category->products as $product)

                            @if($product->trending=='0')
                                <div class="col-5 col-sm-5 col-md-4 col-lg-3 col-xxl-3 ">
                                    <div class="product-card position-relative rounded-1">
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
                                        <span>
                                            {{$product->name}}
                                        </span>
                                                </h5>
                                                <div>
                                                    <span class="selling-price">${{$product->selling_price}}</span>
                                                    @if($product->selling_price!=$product->original_price)
                                                        <span class="original-price">${{$product->original_price}}</span>
                                                    @endif

                                                </div>
                                                <div class="mt-2 ">
                                                        <?php $addedTocart = false ?>
                                                    @forelse(\Illuminate\Support\Facades\Auth::user()->carts as $item)
                                                        @if($product->id ==$item->product_id)
                                                                <?php $addedTocart = true ?>
                                                        @endif

                                                    @empty
                                                    @endforelse
                                                    @if($addedTocart)
                                                        <a wire:click.prevent="toCart({{$product->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                                                           class="btn btn1 "><i class="fa fa-check"></i></a>
                                                    @else
                                                        <a wire:click.prevent="toCart({{$product->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                                                           class="btn btn1 ">Add To Cart</a>
                                                    @endif



                                                        <?php $exists = false ?>
                                                    @forelse(\Illuminate\Support\Facades\Auth::user()->favourites as $item)
                                                        @if($product->id ==$item->product_id)
                                                                <?php $exists = true ?>
                                                        @endif

                                                    @empty
                                                    @endforelse
                                                    <a  wire:click.prevent="toFavourite({{$product->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                                                        class="btn btn1 "> <i
                                                            class="fa fa-heart @if($exists) text-danger @endif "></i> </a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif

                        @empty
                        @endforelse
                    </div>

                </section>
            @endif
        @empty
            <div>
                No Categories Yet
            </div>
        @endforelse
</div>
