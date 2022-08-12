@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="d-flex align-items-center justify-content-between flex-wrap">
                        Products
                        <a class="btn btn-sm btn-primary" href="{{url('admin/product/create')}}">Add Product</a>
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
                                        <a class="btn btn-sm btn-success my-1" href="{{url('admin/product/'.$product->id.'/edit')}}" >Edit</a>
                                        <a class="btn btn-sm btn-danger  my-1">Delete</a>
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
@endsection
