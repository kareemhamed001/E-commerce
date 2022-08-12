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
                        Colors
                        <a class="btn btn-sm btn-primary" href="{{url('admin/color/create')}}">Add color</a>
                    </h3>

                    <div class="card-body">
                        <table class="table container-fluid table-bordered table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Code</td>
                                <td>Status</td>
                                <td>Action</td>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($colors as $color)
                                <tr>
                                    <td>{{$color->id}}</td>
                                    <td>{{$color->name}}</td>
                                    <td>{{$color->code}}</td>
                                    <td>{{$color->status?'Hidden':'Visible'}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success  my-1" href="{{url('admin/color/'.$color->id.'/edit')}}" >Edit</a>
                                        <form class="d-inline-block" action="{{url('admin/colors/'.$color->id)}}" method="post">
                                            @csrf
                                            @method('Delete')
                                        <button class="btn btn-sm btn-danger  my-1" href="" onclick="return confirm('Delete Color: {{$color->name}} ?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{$colors->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
