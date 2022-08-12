@extends('layouts.app')

@section('title')
    {{$product->meta_title}}
@endsection
@section('meta_keywords')
    {{$product->meta_keyword}}
@endsection
@section('meta_description')
    {{$product->meta_description}}
@endsection

@section('content')
    <div>
        <livewire:front-end.product.view :product="$product" :category="$category" />
    </div>

@endsection
