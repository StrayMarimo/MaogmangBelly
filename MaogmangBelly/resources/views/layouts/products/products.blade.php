@extends('layouts.app')
@section("content")

<!-- <div class="row d-flex justify-content-center m-2"> -->
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
    <div class="row d-flex justify-content-center m-3">
        <!-- Include featured products layout -->
        @include('layouts.products.featured_products')
    </div>
    <div style="height: 50rem" class="green-sec mb-3">
        <!-- Include trending products layout -->
        @include('layouts.products.trending_products')
    </div>
    <div>
        <!-- Products section title -->
        <h1 class="mb-3 mt-5 tag2" style="font-family: lexend">Our Products</h1>
        <!-- Include category tabs layout -->
        @include('layouts.products.category_tabs')
    </div>
<!-- 
</div> -->
@include('layouts.products.product_modals')
@include('layouts.products.category_modals')
@endsection