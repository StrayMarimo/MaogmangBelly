<!-- A container for tabbed content -->
<div class="tab-content" id="products-content">

    <!-- Tab pane for displaying all products -->
    <div class="tab-pane fade show active" id="all-products" role="tabpanel" aria-labelledby="category-0">

        <!-- Loop through all the products and display their data -->
        <div class="d-flex justify-content-center">
            @foreach($products as $product)
                @include('layouts.products.product_card')
            @endforeach
        </div>
    </div>

    <!-- Loop through all the categories and create a tab pane for each one -->
    @foreach($categories as $category)
    <div class="tab-pane fade" id="{{$category['name']}}" role="tabpanel"
        aria-labelledby="category-{{$category['id']}}">
        <div class="d-flex justify-content-center">
            <!-- Loop through all the products and display their data if they belong to the current category -->
            @foreach($products as $product)
            @if($product['category_id'] == $category['id'])
                @include('layouts.products.product_card')
            @endif
            @endforeach
        </div>
      
        <!-- Display add product button if user is admin -->
        @if($isAdmin)
        <button type="button" class="btn btn-primary add-product" data-bs-toggle="modal"
            data-bs-target="#add-product-modal" id="add-prod-{{$category['id']}}">
            Add Product
        </button>
        @endif
    </div>
    @endforeach
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="add-product-modal" tabindex="-1" aria-labelledby="add-product-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="add-product-modal-label">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Add Product form -->
            <form action="/add_product" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body add-product">
                    <!-- Save category ID -->
                    <input type="hidden" id="prod-cat-id" value="" name="category_id">
                    <!-- Input for product name -->
                    Name: <input type="text" placeholder="product name..." name="product_name" required> <br />
                    <!-- Input for product description -->
                    Description: <input type="text" placeholder="description..." name="product_desc" required> <br />
                    <!-- Input for product price -->
                    Price: <input type="number" placeholder="120.50" name="product_price" min="0" max="1000000"
                        step="0.01" required> <br />
                    <!-- Input for product stock -->
                    Stock: <input type="number" placeholder="100" name="product_stock" required> <br />
                    <!-- Input for product gallery -->
                    <label for="img">Upload Product Image</label>
                    <div class="row">
                        <div class="col-sm-6 ">
                            <img id="preview-image-before-upload" src="{{asset('/assets/logo.png')}}
                    " alt="preview image" style="height: 200px; width: 200px; object-fit: cover;" class=" mb-2">
                            <input class=" form-control @error('img') is-invalid @enderror " type="file" name="img"
                                value="{{ old('img') }}" id="img">
                            <!-- Display error message if file upload fails -->
                            @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

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