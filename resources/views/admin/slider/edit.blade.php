@extends('layouts.admin')
@section('content')
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Slider
                        <a href="{{url('admin/sliders')}}" class="btn btn-sm btn-primary float-end text-white">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/slider/create/'.$slider->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                            </div>
                            <div class="col-md-6 mb-2 ">
                                <label>Description (at most 200 word)</label>
                                <input type="text" name="description" class="form-control" value="{{$slider->description}}">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" value="{{$slider->title}}">
                                <img src="{{asset($slider->image)}}"
                                     class="col-md-6 overflow-hidden ">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label>Status (checked:hidden)</label><br>
                                <input type="checkbox" name="status" {{$slider->status?'checked':''}}>
                            </div><br>
                            <div class="mt-3 ">
                                <button class="btn btn-sm btn-primary ">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
