<div class="sticky-top" id="indexPage">

    @if(isset($favourites))
        <div id="favSideBar"
             class="col-3 bg-light vh-100 position-fixed top-0 z-index-top shadow bg-opacity-75 pt-5 p-1 overflow-auto  flex-column align-items-center "
             style="display: none">
            <button class=" position-absolute top-0 end-0 btn btn-danger float-end px-2 p-1 rounded" wire:click="closeFav">
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
                                <span class="text-white font-weight-medium font-size-0">{{$item->product->name}}</span>
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


    <div class="main-navbar shadow-sm  sticky-top">

        {{--    {!! $categories=\App\Models\category::limit(10)->get() ; !!}--}}
        <div class="top-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <a class="nav-link" href="{{url('home')}}"><h5 class="brand-name">E-Commerce</h5></a>
                    </div>
                    <div class="col-md-5 my-auto">
                        <form role="search">
                            <div class="input-group">
                                <input type="search" placeholder="Search your product" class="form-control"/>
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-shopping-cart"></i> Cart ({{\Illuminate\Support\Facades\Auth::user()->carts()->count()}})
                                </a>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn cursor-pointer" id="wishListBtn">
                                    <i class="fa fa-heart"></i> Wishlist ({{$favourites->count()}})
                                </button>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{\Illuminate\Support\Facades\Auth::user()->name}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
                                            Cart</a></li>
                                    <li>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-shopping-cart"></i>
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </li>


                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                    E-commerce
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse overflow-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/collections">All Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/new-arrivals">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Featured Products</a>
                        </li>

                        @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{url('collections/'.$category->slug)}}">{{$category->name}}</a>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </nav>
    </div>

</div>
@push('script')
    <script>
        $(document).ready(function () {

            $("#wishListBtn").on('click',()=>{
                $('#favSideBar').toggleClass('d-flex');
                // $('#favSideBar').css({'display':'none'});
            });
            $("#indexPage").on('click',()=>{
                //$('#favSideBar').css({'display':'none'});
                // $('#favSideBar').css({'display':'none'});
            });

            document.addEventListener('scroll',()=>{
               // $('#favSideBar').removeClass('d-flex');
            })
            window.addEventListener('open-favBar', function () {
                $('#favSideBar').toggleClass('d-flex');
            })
            window.addEventListener('close-favBar', function () {
                $('#favSideBar').css({'display':'none'});
            })

        });



    </script>
@endpush
