<<h3 class="mb-5 tag2" id="trendh3" style="font-family: lexend;">
    <span>T</span><span>r</span><span>e</span><span>n</span><span>d</span><span>i</span><span>n</span><span>g</span> Products
</h3>

<div class="trending-warapper">
    @foreach ($trending_products as $item)
    <div class="trending-item col-3">
        <a href="{{ route('product_details', ['id' => $item['id']]) }}" style="font-family: lexend; color: white">
        <img class="trending-image zoomable mx-auto d-block mb-2" src="{{ url('/assets/product_assets/'.$item['gallery']) }}" style="border-radius: 10px; object-fit: cover; width: 230px; height: 230px;">
            <div>
                <h6 class="text-center">{{$item['name']}}</h6>
            </div>
        </a>
    </div>
    @endforeach
</div>