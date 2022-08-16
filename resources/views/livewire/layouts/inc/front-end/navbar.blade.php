<div class="sticky-top">

    @if(isset($favourites))
        <div id="favSideBar"
             class="col-8 col-sm-6 col-md-5 col-lg-3 bg-light vh-100 position-fixed top-0 z-index-top shadow bg-opacity-75 pt-5 p-1 overflow-auto  flex-column align-items-center "
             style="display: none">
            <button class=" position-absolute top-0 end-0 btn btn-danger float-end px-2 p-1 rounded"
                    wire:click="closeFav">
                <i class="fa fa-x"></i>
            </button>

            @foreach($favourites as $item)

                <div class="container-fluid d-flex row w-100 bg-dark bg-opacity-75 h-20  my-1 p-1 position-relative ">
                    <a class="container-fluid d-flex row w-100 col-12 text-decoration-none overflow-hidden h-100"
                       href="{{url('collections/'.$item->product->category->slug.'/'.$item->product->slug)}}">

                        <div class=" h-100 img-fluid overflow-hidden p-0 col-6 ">
                            <img class="overflow-hidden img-fluid w-100 h-100"
                                 src="{{asset($item->product->productImages[0]->image)}}"
                                 alt="" style="object-fit: scale-down">
                        </div>

                        <div class="  h-100  col-6">
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

    <div class="main-navbar w-100  shadow-sm  sticky-top">

        <div class="top-navbar">
            <div class="py-2">
                <div class="row container-fluid  align-items-center ">
                    <div class="col-md-4  d-none d-sm-none d-md-block d-lg-block ps-5">
                        <a class="nav-link w-fit-content d-block" href="{{url('home')}}"><img
                                class="img-fluid rounded-circle" style="height: 4rem;width: 4rem"
                                src="{{asset('assets/images/298170216_3144184582466850_2113745067794617083_n.jpg')}}"
                                alt=""></a>
                    </div>
                    <div class="col-md-4  ">
                        <form role="search" action="{{url('search')}}" method="get">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="searchFor" placeholder="Search your product"
                                       class="form-control" />
                                <button type="submit" class="btn bg-white"  >
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4  ">
                        <ul class="nav justify-content-end align-items-center">

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('cart')}}">
                                    <i class="fa fa-shopping-cart"></i> Cart
                                    ({{\Illuminate\Support\Facades\Auth::user()->carts()->count()}})
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
                                    <img class="img-fluid rounded-circle bg-white"
                                         style="object-fit: scale-down;width: 2rem;height: 2rem;"
                                         src="{{asset(\Illuminate\Support\Facades\Auth::user()->image)}}" alt="">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{url('profile')}}"><i class="fa fa-user"></i>
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{url('cart')}}"><i
                                                class="fa fa-shopping-cart"></i> My
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
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="{{url('home')}}">
                    Marvin
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

            $("#wishListBtn").on('click', () => {
                $('#favSideBar').toggleClass('d-flex');
                // $('#favSideBar').css({'display':'none'});
            });
            $("#indexPage").on('click', () => {
                //$('#favSideBar').css({'display':'none'});
                // $('#favSideBar').css({'display':'none'});
            });

            document.addEventListener('scroll', () => {
                // $('#favSideBar').removeClass('d-flex');
            })
            window.addEventListener('open-favBar', function () {
                $('#favSideBar').toggleClass('d-flex');
            })
            window.addEventListener('close-favBar', function () {
                $('#favSideBar').css({'display': 'none'});
            })

        });


    </script>
@endpush
