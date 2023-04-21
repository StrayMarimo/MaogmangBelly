@extends('layouts.app')
@section("content")

<div class="row d-flex justify-content-center m-2">
    <form class="d-flex justify-content-end mb-4" action="/search" role="search">
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
        <!-- Include category products layout -->
        @include('layouts.products.category_products')
    </div>
</div>
<!-- Add Category Modal -->
<div class="modal fade" id="add-category-modal" tabindex="-1" aria-labelledby="add-category-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="add-category-modal-label">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Add category form -->
            <form action="/add_category" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Input for category name -->
                    Name: <input type="text" placeholder="category name..." name="category_name">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
