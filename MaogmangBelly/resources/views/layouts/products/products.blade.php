@extends('layouts.app')
@section("content")
<div class="row d-flex justify-content-center m-2">
    @include('layouts.products.featured_products')
    @include('layouts.products.trending_products')
    <div>
        <h1>Our Products</h1>
        @include('layouts.products.category_tabs')
        @include('layouts.products.category_products')
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="add-category-modal" tabindex="-1" aria-labelledby="add-category-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-category-modal-label">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/add_category" method="POST">
                @csrf
                <div class="modal-body">
                    Name: <input type="text" placeholder="category name..." name="category_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
