@extends('layouts.admin')
@section('content')
    <div class="row">

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Color
                        <a href="{{url('admin/colors')}}" class="btn btn-sm btn-primary float-end text-white">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/color/create/'.$color->id)}}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $color->name }}">
                                @error('name') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Code</label>
                                <input type="text" name="code" class="form-control" value="{{ $color->code }}">
                                @error('code') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status" {{ $color->status?'checked':'' }}>
                                @error('status') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 col-md-12">
                                    <button type="submit" class="btn btn-primary float-end">Save</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
