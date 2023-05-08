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
    <div class="mb-5 mt-5">
        <h1 class="mb-3 mt-5 tag2" style="font-family: lexend">FEATURED PRODUCTS</h1>
        <p class="cap1 mb-4" style="color: black"> Indulge in the flavors of our featured food products - each one a culinary masterpiece <br> 
        that will leave your taste buds begging for more! </p>
        <!-- Include featured products layout -->
        @include('layouts.products.featured_products')
    </div>
    <br>
    <div style="height: 60rem" class="green-sec mb-3">
        <!-- Include trending products layout -->
        @include('layouts.products.trending_products')
    </div>
    <div>
        <!-- Products section title -->
        <h1 class="mb-3 mt-5 tag2" style="font-family: lexend">OUR PRODUCTS</h1>
        <p class="cap1 mb-4" style="color: black"> From classic favorites to exciting new flavors, our selection of food products will tantalize your taste buds <br> 
        and satisfy your cravings. Discover your next culinary adventure today!
        <!-- Include category tabs layout -->
        @include('layouts.products.category_tabs')
    </div>
<!-- 
</div> -->
@include('layouts.products.product_modals')
@include('layouts.products.category_modals')
@endsection