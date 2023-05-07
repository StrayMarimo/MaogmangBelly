<div class="trending-warapper">
    <h3 class="mb-5 tag2" style="font-family: lexend">Trending Products</h3>
    @foreach ($trending_products as $item)
    <div class="trending-item col-3">
        <a href="{{ route('product_details', ['id' => $item['id']]) }}" style="font-family: lexend; color: white">
            <img style="border-radius: 10px; object-fit: cover; width: 230px; height: 230px;" src="{{ url('/assets/product_assets/'.$item['gallery']) }}" class="trending-image mx-auto d-block mb-2">
            <div>
                <h6 class="text-center">{{$item['name']}}</h6>
            </div>
        </a>
    </div>
    @endforeach
</div>