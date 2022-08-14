<div class="row p-2 position-relative">
    <div class="card border-0 bg-light py-4 col-8">
        <div class="card-header">
            <h3>Shopping Cart</h3>
        </div>
        <div class="card-body">

            <?php $totalPrice = 0 ?>
            @forelse($carts as $cart)

                    <?php $totalPrice += $cart->quantity * $cart->price_per_one; ?>
                <div class="container-fluid bg-light d-flex " style="height: 15rem">

                    <div class="col-3 p-0 h-100 ">
                        <img class="img-fluid h-100" src="{{$cart->product->productImages[0]->image}}" alt=""
                             style="object-fit: scale-down">
                    </div>

                    <div class="col-9 mx-2 overflow-hidden">
                        <div class="position-relative overflow-hidden w-100 h-100">
                            <h3>{{$cart->product->name}}</h3>
                            <p class="my-1 text-break mh-40 overflow-auto text-muted font-size-0 ">{{$cart->product->description}}</p>
                            <p class="my-1 ">color: {{$cart->productColor->color->name}}</p>
                            <p class="my-1">price: {{$cart->price_per_one}} $</p>
                            <p class="my-1">quantity: {{$cart->quantity}}</p>

                            <div
                                class="position-absolute end-0 bottom-0 form-group d-flex align-items-end w-75 float-end justify-content-center">

                                <div class="col-8 h-100">
                                    @if(session('error'))
                                        <div class="alert-danger py-2 px-2 rounded">
                                            {{session('error')}}
                                        </div>
                                    @elseif(session('success'))
                                        <div class="alert-success py-2 px-2 rounded">
                                            {{session('success')}}
                                        </div>
                                    @endif
                                </div>

                                <div class="d-xl-flex float-end col-4">
                                    <input class="form-control " type="number" value="{{$cart->quantity}}"
                                           wire:change="cartQuantity(event.target.value)">
                                    <button class="form-control btn-sm bg-primary text-white"
                                            wire:click.prevent="updateCart({{$cart->id}})">Update
                                    </button>
                                </div>
                            </div>

                            <button wire:click="deleteCart({{$cart->id}})"
                                    class="btn btn-danger  p-2 rounded position-absolute top-0 end-0"><i
                                    class="fa fa-x text-white"></i></button>
                        </div>

                    </div>
                </div>
                <hr>
            @empty
                <div class="col-12">
                    Empty Cart
                </div>
            @endforelse
        </div>
    </div>

    <div class="col-4 vh-25 position-absolute top-0 end-0 vh-25 bg-white border p-3">

        <h4>SubTotal({{$carts->count()}} Items): {{$totalPrice}}</h4>
    </div>
</div>
