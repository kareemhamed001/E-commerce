<div>
    @forelse($categories as $category)
        @if($category->products->count()>0)

            <section class=" container py-3   ">
                <div class=" position-relative">
                    <h3 class="section-heading text-uppercase">{{$category->name}}</h3>
                    <h3 class="section-subheading text-muted"></h3>
                </div>

                <div class="row overflow-auto flex-nowrap">

                    @forelse($category->products as $product)
                        <div class="col-sm-3 ">
                            <div class="product-card position-relative">
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
                                            <a wire:click.prevent="toCart({{$product->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})" class="btn btn1">Add To Cart</a>
                                            <a wire:click.prevent="toFavourite({{$product->id}},{{\Illuminate\Support\Facades\Auth::user()->id}})"
                                               class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
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



@push('script')
    <script>
        window.addEventListener('done-modal',event=>{
            console.log('done');

            doneModal();
        });

        function doneModal(){
            $('#done-modal').show(1000,()=>{
                $('#done-modal').hide(800);
            });
        }
    </script>
@endpush





