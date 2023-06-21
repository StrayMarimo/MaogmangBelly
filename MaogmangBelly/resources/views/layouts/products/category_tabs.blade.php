<nav class="navbar navbar-expand-lg navbar-light bg-light flex-column">
    <div class="container-fluid">
        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Tabs -->
            <ul class="nav nav-tabs me-auto" style="margin-left: 4vw">
                <li class="nav-item">
                    <a class="nav-link active" href="#all-products" data-bs-toggle="tab" style="font-family: Lexend; color: black">All Products</a>
                </li>
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link text-capitalize" data-bs-toggle="tab" href="#category-{{ $category->id }}" style="font-family: Lexend; color: black">{{
                        $category->name }}</a>
                </li>
                @endforeach
            </ul>
            <!-- Dropdown tab -->
            @if($isAdmin)
            <ul class="nav navbar-nav" style="margin-right: 5vw;">
                <li class="nav-item dropdown">
                    <a href="" id="showSettingsBtn"><i class="bi bi-gear-fill" style="font-size: 1.3rem"></i></a>
                    @include('layouts.products.settings_modal')
                </li>
            </ul>
            @endif
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