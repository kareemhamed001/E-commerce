@extends('layouts.admin')
@section('content')
    @livewire('admin.slider.index')
{{--    <div class="row">--}}
{{--        @include('admin.slider.mdal-form')--}}
{{--        <div class="col-md-12">--}}
{{--            @if(session('message'))--}}
{{--                <div class="alert alert-success">{{session('message')}}</div>--}}
{{--            @endif--}}

{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h3 class="d-flex align-items-center justify-content-between flex-wrap">--}}
{{--                        Sliders--}}
{{--                        <a class="btn btn-sm btn-primary" href="{{url('admin/slider/create')}}">Add Slider</a>--}}
{{--                    </h3>--}}

{{--                    <div class="card-body">--}}
{{--                        <table class="table container-fluid table-bordered table-striped">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <td>ID</td>--}}
{{--                                <td>Title</td>--}}
{{--                                <td>Description</td>--}}
{{--                                <td>Status</td>--}}
{{--                                <td>Image</td>--}}
{{--                                <td>Actions</td>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @forelse($sliders as $slider)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$slider->id}}</td>--}}
{{--                                    <td>{{$slider->title}}</td>--}}
{{--                                    <td>{{$slider->Description}}</td>--}}
{{--                                    <td>{{$slider->status?'hidden':'visible'}}</td>--}}
{{--                                    <td >--}}
{{--                                        <img class="" src="{{asset($slider->image)}}" alt="Slider Image">--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a class="btn btn-sm btn-success my-1" href="{{url('admin/product/'.$slider->id.'/edit')}}" >Edit</a>--}}
{{--                                        <a class="btn btn-sm btn-danger  my-1" data-bs-toggle="modal" data-bs-target="#deleteSliderModal">Delete</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @empty--}}
{{--                            @endforelse--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <div class="pagination">--}}
{{--                            {{$sliders->links()}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
