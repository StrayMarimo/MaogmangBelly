<div class="card m-2" style="width: 30rem;">
    <img src="{{ url('/assets/'.$product['gallery']) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$product['name']}}</h5>
        <p class="card-text">{{$product['description']}}</p>
        <a href="details/{{$product['id']}}" class="btn btn-primary">Add to Order</a>
    </div>
</div>