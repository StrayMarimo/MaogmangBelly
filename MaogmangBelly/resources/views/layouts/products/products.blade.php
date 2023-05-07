@extends('layouts.app')
@section("content")

<div class="row d-flex justify-content-center m-2">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @elseif(session('failed'))
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endif
    <form class="d-flex justify-content-end mb-4" action="{{ route('search') }}" role="search" id="form-search">
        <input class="form-control me-4 search-box" type="text" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-danger" type="submit" >Search</button>
    </form>
    <!-- Include featured products layout -->
    @include('layouts.products.featured_products')
    <!-- Include trending products layout -->
    @include('layouts.products.trending_products')
    <div>
        <!-- Products section title -->
        <h1>Our Products</h1>
        <!-- Include category tabs layout -->
        @include('layouts.products.category_tabs')
    </div>

</div>
@include('layouts.products.product_modals')
@include('layouts.products.category_modals')
@endsection