<div class="card mx-4">
    <img src="{{ url('/assets/product_assets/'.$product['gallery']) }}" class="card-img-top" style="height:30vh;">
    <div class="card-body">
        <h5 class="card-title">{{$product['name']}}</h5>
        <p class="card-text" style="max-height: 6em; overflow: hidden; text-overflow: ellipsis;">
            {{$product['description']}}</p>
        <a href="{{ route('product_details', ['id' => $product['id']]) }}" class="btn btn-primary">Add to Order</a>
        @if($isAdmin)

        <div class="card-icons">
            <a href="" id="editProduct" data-product-id="{{$product['id']}}" class="edit-product"><i class="bs bi-pen-fill"></i></a>
            <a href="" id="deleteProduct" data-product-id="{{$product['id']}}" data-product-name="{{$product['name']}}" class="delete-product"><i class="bs bi-trash-fill"></i></a>
        </div>
        @endif
    </div>
</div>