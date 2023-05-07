<div class="card" style="width: 20vw;">
    <img src="{{ url('/assets/product_assets/'.$product['gallery']) }}" class="card-img-top" style="height: 30vh;">
    <div class="card-body">
        <div style="height: 4rem">
            <h5 class="card-title">{{$product['name']}}</h5>
        </div>
        <p class="card-text" style="max-height: 6em; overflow: hidden; text-overflow: ellipsis;">
            {{$product['description']}}</p>
            <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('product_details', ['id' => $product['id']]) }}" class="btn btn-danger"
                style="background-color: #dc3545;">Add to Order</a>
            @if($isAdmin)
            <a href="" id="editProduct" data-product-id="{{$product['id']}}" class="edit-product"><i
                    class="bs bi-pen-fill" style="color:#dc3545; font-size: 1.2rem"></i></a>
            <a href="" id="deleteProduct" data-product-id="{{$product['id']}}" data-product-name="{{$product['name']}}"
                class="delete-product "><i class="bs bi-trash-fill" style="color:#dc3545; font-size: 1.2rem"></i></a>
            @endif
        </div>
    </div>
</div>