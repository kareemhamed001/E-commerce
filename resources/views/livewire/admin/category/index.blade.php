<div>

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory" method="post">

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

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Categories
                    <a href="#" class="btn btn-sm btn-danger float-end text-white ms-1" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="deleteAll">Delete All</a>
                    <a href="{{url('admin/category/create')}}" class="btn btn-sm btn-primary float-end text-white">Add Category </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->status=='1'?'Hidden':'Visable'}}</td>
                            <td>
                                <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="deleteCategory({{$category->id}})">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="float-end">
                    {{$categories->links()}}
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
