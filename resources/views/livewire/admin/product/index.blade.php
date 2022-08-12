<div class="row">

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyProduct" method="post">

                    <div class="modal-body">
                        <h6>
                            Are you Sure?
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="">
                    Products
                    <a href="#" class="btn btn-sm btn-danger float-end text-white ms-1" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="deleteAll">Delete All</a>
                    <a class="btn btn-sm btn-primary float-end" href="{{url('admin/product/create')}}">Add Product</a>
                </h3>

                <div class="card-body">
                    <table class="table container-fluid table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Slug</td>
                            <td>Brand</td>
                            <td>Category</td>
                            <td>Small Description</td>
                            <td>Original Price</td>
                            <td>Selling Price</td>
                            <td>Status</td>
                            <td>Trending</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->slug}}</td>
                            <td>{{$product->brand->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->small_description}}</td>
                            <td>{{$product->original_price}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td>{{$product->status?'hidden':'visible'}}</td>
                            <td>{{$product->trending?'hidden':'visible'}}</td>
                            <td>
                                <a class="btn btn-sm btn-success w-100 my-1" href="{{url('admin/product/'.$product->id.'/edit')}}" >Edit</a>
                                <a class="btn btn-sm btn-danger w-100 my-1" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="deleteProduct({{$product->id}})">Delete</a>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal',event=>{
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush

