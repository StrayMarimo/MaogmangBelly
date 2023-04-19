<div class="card mx-4">
    <img src="{{ url('/assets/product_assets/'.$product['gallery']) }}" class="card-img-top" style="width: 300px; height: 200px;">
    <div class="card-body">
        <h5 class="card-title">{{$product['name']}}</h5>
        <p class="card-text">{{$product['description']}}</p>
        <a href="details/{{$product['id']}}" class="btn btn-primary">Add to Order</a>
    </div>
</div>