<ul class="nav nav-tabs nav-fill" id="products" role="tablist">
    <li class="nav-item" role="presentation">
        <!-- Tab to show all products -->
        <a class="nav-link active" id="category-0" data-mdb-toggle="tab" href="#all-products" role="tab"
            aria-controls="all-products" aria-selected="true">All Products</a>
    </li>
    @foreach($categories as $category)
    <li class="nav-item" role="presentation">
        <!-- Tab to show products in a specific category -->
        <a class="nav-link" id="category-{{$category['id']}}" data-mdb-toggle="tab" href="#_{{$category['id']}}"
            role="tab" aria-controls="_{{$category['id']}}" aria-selected="false">
            <!-- Form to edit category name -->
            <form action="/edit_category" method="POST" class="row g-3" id="form-{{$category['id']}}">
                @csrf
                <input type="hidden" name="category_id" value="0" id="cat-edit" class="category-tab">
                <input type="hidden" name="to_delete" value="0" id="to-delete" class="delete-category-tab">
                <div class="col-auto">
                    <!-- Display category name in a tab -->
                    <input type="text" class="form-control-plaintext category-tabs text-center text-capitalize"
                        id="tab-{{$category['id']}}" value="{{$category['name']}}" name="category_name" readonly />
                </div>
                @if($isAdmin)
                <div class="col-auto">
                    <!-- Button to edit category name -->
                    <button type="button" class="btn category-edit" id="cat-edit-{{$category['id']}}">
                        <i class="bi bi-pencil-fill" id="cat-icon-{{$category['id']}}"></i>
                    </button>
                    <!-- Button to delete category -->
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
        <!-- Button to add new category -->
        <a class="nav-link text-capitalize" id="category-{{$category['id']}}" data-mdb-toggle="tab"
            href="#{{$category['name']}}" role="tab" aria-controls="{{$category['name']}}" aria-selected="false">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-category-modal">
                <i class="bi bi-plus-circle"></i>
            </button>
        </a>
    </li>
    @endif
</ul>