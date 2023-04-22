@extends('layouts.app')
@section("content")

<div class="row d-flex justify-content-center m-2">
    <form class="d-flex justify-content-end mb-4" action="{{ route('search') }}" role="search" id="form-search">
        <input class="form-control me-4 search-box" type="text" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
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
@include('layouts.products.add_product_modal')
@include('layouts.products.category_modals')
@endsection