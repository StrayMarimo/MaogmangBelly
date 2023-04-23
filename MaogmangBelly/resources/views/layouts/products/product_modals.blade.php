<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" data-categories="" tabindex="-1" aria-labelledby="add-product-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="add-product-modal-label">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Add Product form -->
            <form action="{{ route('add_product')}}" method="POST" enctype="multipart/form-data" id="addProductForm">
                @csrf
                <div class="form-group">
                    <select class="form-control" id="parentCategory" required>
                        <!-- dynamically populate options here -->
                    </select>
                </div>
                <!-- Save category ID -->
                <input type="hidden" id="product-category-id" value="" name="category_id" required>
                <!-- Input for product name -->
                Name: <input type="text" placeholder="product name..." name="product_name" required> <br />
                <!-- Input for product description -->
                Description: <textarea rows="4" cols="50" placeholder="description..." name="product_desc" required></textarea> <br />
                <!-- Input for product price -->
                Price: <input type="number" placeholder="120.50" name="product_price" min="0" max="1000000" step="0.01"
                    required> <br />
                <!-- Input for product price for 10pax-->
                Price(10pax): <input type="number" placeholder="120.50" name="product_price_10" min="0" max="1000000"
                    step="0.01" required> <br />
                <!-- Input for product price for 20pax-->
                Price(20pax): <input type="number" placeholder="120.50" name="product_price_20" min="0" max="1000000"
                    step="0.01" required> <br />
                <!-- Input for product stock -->
                Stock: <input type="number" placeholder="100" name="product_stock" required> <br />
                <!-- Input for product gallery -->
                <input type="checkbox" name="is_trending"> Trending Product <br />
                <input type="checkbox" name="is_featured"> Featured Product <br />
                <label for="img">Upload Product Image</label>
                <div class="row">
                    <div class="col-sm-6 ">
                        <img id="preview-image-before-upload" src="{{asset('/assets/logo.png')}}
                    " alt="preview image" style="height: 200px; width: 200px; object-fit: cover;" class=" mb-2">
                        <input class=" form-control @error('img') is-invalid @enderror " type="file" name="img"
                            value="{{asset('/assets/logo.png')}}" id="img" required>
                        <!-- Display error message if file upload fails -->
                        @error('img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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

<!-- Delete Product Modal -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteProductForm" action="{{ route('delete_product')}}" method="POST">
                    @csrf
                    <!-- Save category ID -->
                    <input type="hidden" id="deleteProductId" value="" name="product_id" required>
                    <p id="deleteProductName">Are you sure you want to delete</p>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary">No</button>
                </form>
            </div>
        </div>
    </div>
</div>