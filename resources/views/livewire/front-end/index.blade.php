<div>



    <div >
        @if(isset($favourites))
            <div id="favSideBar"
                 class="col-3 bg-light vh-100 position-fixed top-0 z-index-top shadow bg-opacity-75 pt-5 p-1 overflow-auto  flex-column align-items-center "
                 style="display: none">
                <button class=" position-absolute top-0 end-0 btn btn-danger float-end px-2 p-1 rounded"
                        wire:click="closeFav">
                    <i class="fa fa-x"></i>
                </button>

                @foreach($favourites as $item)

                    <div class="container-fluid d-flex row w-100 bg-dark h-20  my-1 p-1 position-relative ">
                        <a class="container-fluid d-flex row w-100 col-11 text-decoration-none"
                           href="{{url('collections/'.$item->product->category->slug.'/'.$item->product->slug)}}">

                            <div class=" h-100 overflow-hidden p-0 col-4 ">
                                <img class="overflow-hidden w-100 h-100"
                                     src="{{asset($item->product->productImages[0]->image)}}"
                                     alt="" style="object-fit: scale-down">
                            </div>

                            <div class="  h-100  col-8">
                                <div class="d-flex flex-column justify-content-center align-items-start h-100 ">
                                    <span
                                        class="text-white font-weight-medium font-size-0">{{$item->product->name}}</span>
                                </div>
                            </div>


                        </a>
                        <div
                            class="bg-danger position-absolute end-0  col-1 d-flex justify-content-center align-items-center rounded  btn"
                            wire:click="deleteFav({{$item->id}})"><i class="fa fa-x text-white "></i></div>

                    </div>

                @endforeach
            </div>
        @endif

{{--        <div class="main-navbar shadow-sm  sticky-top ">--}}
{{--            --}}{{--    {!! $categories=\App\Models\category::limit(10)->get() ; !!}--}}
{{--            <div class="top-navbar">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">--}}
{{--                            <a class="nav-link" href="{{url('home')}}"><h5 class="brand-name">E-Commerce</h5></a>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-5 my-auto">--}}
{{--                            <form role="search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="search" placeholder="Search your product" class="form-control"/>--}}
{{--                                    <button class="btn bg-white" type="submit">--}}
{{--                                        <i class="fa fa-search"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-5 my-auto">--}}
{{--                            <ul class="nav justify-content-end">--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#">--}}
{{--                                        <i class="fa fa-shopping-cart"></i> Cart ({{$carts->count()}})--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <button class="nav-link btn cursor-pointer" wire:click="openFav">--}}
{{--                                        <i class="fa fa-heart"></i> Wishlist ({{$favourites->count()}})--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item dropdown">--}}
{{--                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
{{--                                       data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                        <i class="fa fa-user"></i> {{\Illuminate\Support\Facades\Auth::user()->name}}--}}
{{--                                    </a>--}}
{{--                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                        <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My--}}
{{--                                                Wishlist</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My--}}
{{--                                                Cart</a></li>--}}
{{--                                        <li>--}}

{{--                                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">--}}
{{--                                                <i class="fa fa-shopping-cart"></i>--}}
{{--                                                {{ __('Logout') }}--}}
{{--                                            </a>--}}
{{--                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                                  class="d-none">--}}
{{--                                                @csrf--}}
{{--                                            </form>--}}
{{--                                        </li>--}}


{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <nav class="navbar navbar-expand-lg ">--}}
{{--                <div class="container-fluid">--}}
{{--                    <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">--}}
{{--                        E-commerce--}}
{{--                    </a>--}}
{{--                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"--}}
{{--                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
{{--                            aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                        <span class="navbar-toggler-icon"></span>--}}
{{--                    </button>--}}
{{--                    <div class="collapse navbar-collapse overflow-auto" id="navbarSupportedContent">--}}
{{--                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="/home">Home</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="/collections">All Categories</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="/new-arrivals">New Arrivals</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">Featured Products</a>--}}
{{--                            </li>--}}

{{--                            @foreach($categories as $category)--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link"--}}
{{--                                       href="{{url('collections/'.$category->slug)}}">{{$category->name}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}


{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--        </div>--}}


        <section class="w-100 p-0">
            <div class="overflow-hidden" style="height: 85vh;">


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
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
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

                    <div class="row overflow-auto flex-nowrap">


                        @forelse($category->products as $product)

                            @if($product->trending=='0')
                                <div class="col-sm-4 col-md-3 col-lg-3 col-xxl-2 ">
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
        {{--    @foreach(\Illuminate\Support\Facades\Auth::user()->favourites as $fav)--}}
        {{--        {{$fav}}--}}
        {{--    @endforeach--}}
    </div>
</div>









