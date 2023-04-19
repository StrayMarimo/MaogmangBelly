<div class="custom-product col-6">
    <div id="product-showcase" class="carousel slide">
        <div class="carousel-inner">
            @foreach ($products as $item)
            <div class="carousel-item {{$item['id'] == 1 ? 'active' : ''}}">
                <a href="details/{{$item['id']}}">
                    <img class="slider-img w-100 px-5" src="{{ url('/assets/product_assets/'.$item['gallery']) }}"
                        class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block slider-text">
                        <h5>{{$item['name']}}</h5>
                        <p>{{$item['description']}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev mx-5" type="button" data-bs-target="#product-showcase"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next mx-5" type="button" data-bs-target="#product-showcase"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>