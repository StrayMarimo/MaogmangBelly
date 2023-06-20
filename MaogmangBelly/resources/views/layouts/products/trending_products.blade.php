<div class="trending-warapper">
    <h3 class="mb-3 tag2" style="font-family: lexend">TRENDING PRODUCTS</h3>
    <p class="cap1 mb-5"> Taste the latest food trends with our featured products - innovative, delicious, <br> 
        and guaranteed to elevate your dining experience to the next level!</p>
    @foreach ($trending_products as $item)
    <div class="trending-item col-3 trending-fade-in">
        <a href="{{ route('product.show', ['product' => $item['id']]) }}" style="font-family: lexend; color: white">
            <img style="border-radius: 10px; object-fit: cover; width: 230px; height: 230px;" src="{{ url('/assets/product_assets/'.$item['gallery']) }}" class="trending-image mx-auto d-block mb-2">
            <div>
                <h6 class="text-center text-white">{{$item['name']}}</h6>
            </div>
        </a>
    </div>
    @endforeach
</div>