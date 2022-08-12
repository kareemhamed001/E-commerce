<div>
    @include('livewire.admin.brand.mdal-form')

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands
                        <a href="#" class="float-end btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brand</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>
                            @forelse($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    @if($brand->category_id)
                                        <td>{{$brand->category->name}}</td>
                                    @else
                                        <td>No category</td>
                                    @endif

                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->status=='1'?'hidden':'visible'}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editBrandModal" wire:click="editBrand({{$brand->id}})">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="deleteBrand({{$brand->id}})">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Data</td>
                                </tr>

                            @endforelse
                        </tbody>
                    </table>
                    <div class="float-end">
{{--                        {{$brands->links('pagination::bootstrap-5')}}--}}
                        {{$brands->links()}}
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@push('script')
    <script>
        window.addEventListener('close-modal',event=>{
            $('#editBrandModal').modal('hide');
            $('#addBrandModal').modal('hide');
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
