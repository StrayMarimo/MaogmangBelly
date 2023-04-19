<div class="trending-warapper">
    <h3>Trending Products</h3>
    @foreach ($products as $item )
    <div class="trending-item col-5">
        <a href="details/{{$item['id']}}">
            <img src="{{ url('/assets/product_assets/'.$item['gallery']) }}" class="trending-image mx-auto d-block">
            <div>
                <h6 class="text-center">{{$item['name']}}</h6>
            </div>
        </a>
    </div>
    @endforeach
</div>