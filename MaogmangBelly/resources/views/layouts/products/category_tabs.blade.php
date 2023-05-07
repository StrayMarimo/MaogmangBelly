<nav class="navbar navbar-expand-lg navbar-light bg-light flex-column">
    <div class="container-fluid">
        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Tabs -->
            <ul class="nav nav-tabs me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#all-products" data-bs-toggle="tab">All Products</a>
                </li>
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link text-capitalize" data-bs-toggle="tab" href="#category-{{ $category->id }}">{{
                        $category->name }}</a>
                </li>
                @endforeach

            </ul>
            <!-- Dropdown tab -->
            <ul class="nav navbar-nav ms-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" data-bs-offset="-10,-20" data-bs-popper="none" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" id="addCategory">Add Category</a>
                        <a class="dropdown-item" href="#" id="editCategory">Edit Category</a>
                        <a class="dropdown-item" href="#" id="deleteCategory">Delete Category</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" id="addProduct">Add More
                            Products</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Tab content -->
    <div class="tab-content p-5">
        <div class="tab-pane fade show active" id="all-products">
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($products as $product)
                <div class="col-3">
                    <div class="d-flex justify-content-center">
                        @include('layouts.products.product_card')
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @foreach ($categories as $category)
        <div class="tab-pane fade" id="category-{{ $category->id }}">
            <div class="row">
                <!-- Loop through all the products and display their data if they belong to the current category -->
                @foreach($products as $product)
                @if($product['category_id'] == $category['id'])
                <div class="col-3">
                    <div class="d-flex justify-content-center">
                        @include('layouts.products.product_card')
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</nav>