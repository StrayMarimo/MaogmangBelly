<!-- A container for tabbed content -->
<div class="tab-content" id="products-content">

    <!-- Tab pane for displaying all products -->
    <div class="tab-pane fade show active" id="all-products" role="tabpanel" aria-labelledby="category-0">

        <!-- Loop through all the products and display their names -->
        @foreach($products as $product)
        <div>
            {{$product['name']}}
        </div>
        @endforeach

    </div>

    <!-- Loop through all the categories and create a tab pane for each one -->
    @foreach($categories as $category)
    <div class="tab-pane fade" id="{{$category['name']}}" role="tabpanel"
        aria-labelledby="category-{{$category['id']}}">

        <!-- Loop through all the products and display their names if they belong to the current category -->
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