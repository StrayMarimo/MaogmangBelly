<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" data-categories="" tabindex="-1" aria-labelledby="add-product-modal-label"
    aria-hidden="true" style="font-family:'Franklin Gothic Medium';">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="add-product-modal-label">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Add Product form -->
            <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data" id="addProductForm"
                style="margin: 20px; line-height: 2.5;" class="mb-2">
                @csrf
                <div class="form-group mb-2">
                    <select class="form-control" id="parentCategory" required>
                        <!-- dynamically populate options here -->
                    </select>
                </div>
                <!-- Save category ID -->
                <input type="hidden" id="product-category-id" value="" name="category_id" required>
                <!-- Input for product name -->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input id="product_name" type="text" class="boxbox form-control @error('name') is-invalid @enderror"
                        name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name"
                        autofocus>
                    <label for="floatingInput">Product Name</label>
                </div>
                <!-- Input for product description -->
                <textarea class="contact-box-3 form-control my-2 mb-3" name="product_desc" placeholder="Description"
                    rows="4"></textarea>
                <!-- Input for product price -->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input id="product_price" type="number"
                        class="boxbox form-control @error('name') is-invalid @enderror" name="product_price" min="0"
                        max="1000000" step="0.01" value="{{ old('product_price') }}" required
                        autocomplete="product_price" autofocus>
                    <label for="floatingInput">Price</label>
                </div>
                <!-- Price: <input type="number" placeholder="120.50" name="product_price" min="0" max="1000000" step="0.01" required> <br /> -->
                <!-- Input for product price for 10pax-->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input id="product_price_10" type="number"
                        class="boxbox form-control @error('name') is-invalid @enderror" name="product_price_10" min="0"
                        max="1000000" step="0.01" value="{{ old('product_price_10') }}" required
                        autocomplete="product_price_10" autofocus>
                    <label for="floatingInput">Price(10 pax)</label>
                </div>
                <!-- Price(10pax): <input type="number" placeholder="120.50" name="product_price_10" min="0" max="1000000" step="0.01" required> <br /> -->
                <!-- Input for product price for 20pax-->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input id="product_price_20" type="number"
                        class="boxbox form-control @error('name') is-invalid @enderror" name="product_price_20" min="0"
                        max="1000000" step="0.01" value="{{ old('product_price_20') }}" required
                        autocomplete="product_price_20" autofocus>
                    <label for="floatingInput">Price(20 pax)</label>
                </div>
                <!-- Price(20pax): <input type="number" placeholder="120.50" name="product_price_20" min="0" max="1000000" step="0.01" required> <br /> -->
                <!-- Input for product stock -->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input id="product_stock" type="number"
                        class="boxbox form-control @error('name') is-invalid @enderror" name="product_stock" min="0"
                        max="1000000" value="{{ old('product_stock') }}" required autocomplete="product_stock"
                        autofocus>
                    <label for="floatingInput">Stock</label>
                </div>
                <!-- Stock: <input type="number" placeholder="100" name="product_stock" required> <br /> -->
                <!-- Input for product gallery -->
                <input type="checkbox" name="is_trending"> Trending Product <br />
                <input type="checkbox" name="is_featured"> Featured Product <br />
                <label for="img">Upload Product Image</label>
                <div class="row mb-3">
                    <div class="col-sm-6 ">
                        <img id="preview-image-before-upload" src="{{asset('/assets/product_assets/spaghetti.jpg')}}"
                            alt="preview image" style="height: 216px; width: 288px; object-fit: cover;" class=" mb-2">
                        <input class=" form-control @error('img') is-invalid @enderror " type="file" name="img"
                            value="{{asset('/assets/logo.png')}}" id="img" required>
                        <!-- Display error message if file upload fails -->
                        @error('img')
                        <span class="invalid-feedback" role="alert" style="mb-2">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer mt-2">
                    <button type="submit" class="red-btn3 btn btn-primary" style="background-color: #a72322 ">Save Changes</button>
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
                <form id="deleteProductForm" action="{{ route('product.destroy', ['product' => 'product_id'])}}" method="POST">
                    @csrf
                    <!-- Save category ID -->
                    <input type="hidden" id="deleteProductId" value="" name="product_id" required>
                    <p id="deleteProductName">Are you sure you want to delete</p>
                    <button type="submit" class="btn btn-primary" style="background-color: #a72322">Yes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Product Modal -->
<div class="modal fade" id="editProductModal" data-categories="" tabindex="-1"
    aria-labelledby="edit-product-modal-label" aria-hidden="true" style="font-family: 'Franklin Gothic Medium';">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="edit-product-modal-label">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Edit Product form -->
            <form action="{{ route('product.update', ['product' => 'product_id'])}}" method="POST" enctype="multipart/form-data" id="editProductForm"
                style="margin: 20px; line-height: 2.5;">
                @csrf
                <!-- Save product ID -->
                <input type="hidden" id="productId" value="" name="product_id" required>
                <!-- Save category ID -->
                <input type="hidden" id="productCategoryId" value="" name="category_id" required>
                <div class="form-group mb-2">
                    <select class="form-control" id="selectCategoryUpdate" required>
                        <!-- dynamically populate options here -->
                    </select>
                </div>
                <!-- Input for product name -->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input type="text" id="name" name="product_name"
                        class="boxbox form-control @error('product_name') is-invalid @enderror"
                        value="{{ old('product_name') }}" required>
                    <label for="floatingInput">Name</label>
                </div>
                <!-- Input for product description -->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <textarea rows="4" cols="50" id="description" name="product_desc"
                        class="boxbox pt-5 form-control @error('product_desc') is-invalid @enderror" required
                        style="height:fit-content">{{ old('product_desc') }}</textarea>
                    <label for="floatingTextarea">Description</label>
                </div>
                <!-- Input for product price -->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input type="number" id="price" name="product_price" min="0" max="1000000" step="0.01"
                        class="boxbox form-control @error('product_price') is-invalid @enderror"
                        value="{{ old('product_price') }}" required>
                    <label for="floatingInput">Price</label>
                </div>
                <!-- Input for product price for 10pax-->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input type="number" id="price10" name="product_price_10" min="0" max="1000000" step="0.01"
                        class="boxbox form-control @error('product_price_10') is-invalid @enderror"
                        value="{{ old('product_price_10') }}" required>
                    <label for="floatingInput">Price (10pax)</label>
                </div>
                <!-- Input for product price for 20pax-->
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input type="number" id="price20" placeholder="120.50" name="product_price_20" min="0" max="1000000"
                        step="0.01" class="boxbox form-control @error('product_price_20') is-invalid @enderror"
                        value="{{ old('product_price_20')}}" required>
                    <label for="floatingInput">Price (20pax)</label>
                </div>
                <div class="form-box form-floating mb-3 col-md-auto">
                    <input id="stock" type="number"
                        class="boxbox form-control @error('product_stock') is-invalid @enderror" name="product_stock"
                        min="0" max="1000000" value="{{ old('product_stock') }}" required autocomplete="product_stock"
                        autofocus>
                    <label for="stock">Stock</label>
                    @error('product_stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Input for product gallery -->
                <input type="checkbox" name="is_trending" id="isTrending" class="form-check-input">
                <label for="isTrending" class="form-check-label">Trending Product</label> <br />
                <input type="checkbox" name="is_featured" id="isFeatured" class="form-check-input">
                <label for="isFeatured" class="form-check-label">Featured Product</label> <br />
                <label for="img">Upload Product Image</label>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <img id="preview-image-before-upload" src="{{ asset('/assets/product_assets/spaghetti.jpg') }}"
                            alt="preview image" style="height: 216px; width: 288px; object-fit: cover;" class="mb-2">
                        <input class="form-control @error('img') is-invalid @enderror" type="file" name="img" id="img"
                            accept="image/*" required>
                        <!-- Display error message if file upload fails -->
                        @error('img')
                        <span class="invalid-feedback" role="alert" style="mb-2">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer mt-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #a72322 ">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>