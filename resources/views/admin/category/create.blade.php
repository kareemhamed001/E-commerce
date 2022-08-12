@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category
                        <a href="{{url('admin/category')}}" class="btn btn-sm btn-primary float-end text-white">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="mb-3 col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                                @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Description</label>
                                <textarea type="text" name="description" class="form-control"
                                          value="{{ old('description') }}"></textarea>
                                @error('description') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                                @error('image') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status" value="{{ old('status') }}">
                                @error('status') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-12">
                                <h4>SEO TAGS</h4>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control"
                                       value="{{ old('meta_title') }}">
                                @error('meta_title') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" class="form-control"
                                          value="{{ old('meta_keyword') }}"></textarea>
                                @error('meta_keyword') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Meta Description</label>
                                <input type="text" name="meta_description" class="form-control"
                                       value="{{ old('meta_description') }}">
                                @error('meta_description') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

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
