@extends('layouts.app')
@section("content")
<div class="row d-flex justify-content-center m-2">
    <div class="custom-product col-6">
        <div id="product-showcase" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($products as $item)
                <div class="carousel-item {{$item['id'] == 1 ? 'active' : ''}}">
                    <a href="details/{{$item['id']}}">
                        <img class="slider-img w-100 px-5" src="{{$item['gallery']}}" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block slider-text">
                            <h5>{{$item['name']}}</h5>
                            <p>{{$item['description']}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev mx-5" type="button" data-bs-target="#product-showcase"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next mx-5" type="button" data-bs-target="#product-showcase"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="trending-warapper">
        <h3>Trending Products</h3>
        @foreach ($products as $item )
        <div class="trending-item col-5">
            <a href="details/{{$item['id']}}">
                <img src="{{$item['gallery']}}" class="trending-image mx-auto d-block">
                <div>
                    <h6 class="text-center">{{$item['name']}}</h6>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div>
        <h1>Our Products</h1>
        <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-fill" id="products" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="category-0" data-mdb-toggle="tab" href="#all-products" role="tab"
                    aria-controls="all-products" aria-selected="true">All Products</a>
            </li>
            @foreach($categories as $category)
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="category-{{$category['id']}}" data-mdb-toggle="tab"
                    href="#{{$category['name']}}" role="tab" aria-controls="{{$category['name']}}"
                    aria-selected="false">
                    <form action="/edit_category" method="POST" class="row g-3" id="form-{{$category['id']}}">
                        @csrf
                        <input type="hidden" name="category_id" value="0" id="cat-edit" class="category-tab">
                        <input type="hidden" name="to_delete" value="0" id="to-delete" class="delete-category-tab">
                        <div class="col-auto">
                            <input type="text" class="form-control-plaintext category-tabs text-center text-capitalize"
                                id="tab-{{$category['id']}}" value="{{$category['name']}}" name="category_name"
                                readonly />
                        </div>
                        @if($isAdmin)
                        <div class="col-auto">
                            <button type="button" class="btn category-edit" id="cat-edit-{{$category['id']}}">
                                <i class="bi bi-pencil-fill" id="cat-icon-{{$category['id']}}"></i>
                            </button>
                            <button type="button" class="btn category-delete" id="cat-delete-{{$category['id']}}">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </div>
                        @endif
                    </form>
                </a>
            </li>
            @endforeach
            @if($isAdmin)
            <li class="nav-item" role="presentation">
                <a class="nav-link text-capitalize" id="category-{{$category['id']}}" data-mdb-toggle="tab"
                    href="#{{$category['name']}}" role="tab" aria-controls="{{$category['name']}}"
                    aria-selected="false">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add-category-modal">
                        <i class="bi bi-plus-circle"></i>
                    </button>
                </a>
            </li>
            @endif
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="products-content">
            <div class="tab-pane fade show active" id="all-products" role="tabpanel" aria-labelledby="category-0">
                @foreach($products as $product)
                <div>
                    {{$product['name']}}
                </div>
                @endforeach
            </div>
            @foreach($categories as $category)
            <div class="tab-pane fade" id="{{$category['name']}}" role="tabpanel"
                aria-labelledby="category-{{$category['id']}}">
                @foreach($products as $product)
                @if($product['category_id'] == $category['id'])
                <div>
                    {{$product['name']}}
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
        </div>
        <!-- Tabs content -->

    </div>
</div>

<!-- Modal -->
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
