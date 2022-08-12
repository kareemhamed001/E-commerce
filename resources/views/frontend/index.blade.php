@extends('layouts.app')
@section('content')
    <section class="w-100 p-0">
        <div class="overflow-hidden" style="height: 85vh;">


            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="false">

                <div class="carousel-inner h-100">

                    @foreach($sliders as $key =>$slider)
                        <div class="carousel-item h-100 {{$key==0?'active':''}}">
                            <img src="{{asset($slider->image)}}" class="d-block h-100 w-100" alt="..." style="object-fit: cover">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="custom-carousel-content">
                                    <h1>
                                        {{$slider->title}}
                                    </h1>
                                    <p>
                                        {{$slider->description}}
                                    </p>
                                    <div>
                                        <a  href="{{url('collections/'.$slider->category->slug)}}" class="btn btn-slider">
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
                                <img src="{{asset('uploads/category/'.$category->image)}}" class="w-100" alt="Laptop">
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

    <livewire:front-end.index />
@endsection
