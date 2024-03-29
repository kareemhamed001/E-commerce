<div class="main-navbar shadow-sm sticky-top">

{{--    {!! $categories=\App\Models\category::limit(10)->get() ; !!}--}}
    <div class="top-navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <a class="nav-link" href="{{url('home')}}"><h5 class="brand-name"><img src="{{asset('assets/images/298170216_3144184582466850_2113745067794617083_n.jpg')}}" alt=""></h5></a>
                </div>
                <div class="col-md-5 my-auto">
                    <form role="search">
                        <div class="input-group">
                            <input type="search" placeholder="Search your product" class="form-control" />
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
                                <i class="fa fa-shopping-cart"></i> Cart (0)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-heart"></i> Wishlist (0)
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> {{\Illuminate\Support\Facades\Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                                <li>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-shopping-cart"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                <img src="{{asset('assets/images/298170216_3144184582466850_2113745067794617083_n.jpg')}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                            <a class="nav-link" href="{{url('collections/'.$category->slug)}}">{{$category->name}}</a>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
    </nav>
</div>
