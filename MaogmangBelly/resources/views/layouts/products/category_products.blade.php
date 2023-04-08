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