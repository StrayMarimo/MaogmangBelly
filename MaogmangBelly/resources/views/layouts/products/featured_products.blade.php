<!-- <div class="custom-product col-6">
    <div id="product-showcase" class="carousel slide">
        <div class="carousel-inner">
            @foreach ($featured_products as $item)
            <div class="carousel-item {{$loop->index == 1 ? 'active' : ''}}">
                <a href="{{ route('product.show', ['product' => $item['id']]) }}">
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
        <button id="nextBtn" class="carousel-control-next mx-5" type="button" data-bs-target="#product-showcase"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <script>
            $(document).ready(function() {
                var intervalId = setInterval(function() {
                    $('#nextBtn').click();
                }, 4000);

                // When the user clicks on the previous button, reset the timer
                $('.carousel-control-prev').click(function() {
                    clearInterval(intervalId);
                    intervalId = setInterval(function() {
                        $('#nextBtn').click();
                    }, 4000);
                });
            });
        </script>
    </div>
</div> -->

<div id="carouselExampleCaptions" class="custom-product carousel h-150 slide" data-bs-ride="false">
    <div id="product-showcase" class="carousel slide">
        <div class="carousel-inner">
            @foreach ($featured_products as $item)
            <div class="carousel-item {{$loop->index == 1 ? 'active' : ''}}">
                <a href="{{ route('product.show', ['product' => $item['id']]) }}">
                    <img class="d-block w-100 brightness" src="{{ url('/assets/product_assets/'.$item['gallery']) }}" width=100%
                        class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block slider-text" id="carouselCaption">
                        <h1 style="font-family: 'Lexend';">{{$item['name']}}</h1>
                        <p class="cap1 mb-2">{{$item['description']}}</p>
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
        <button id="nextBtn" class="carousel-control-next mx-5" type="button" data-bs-target="#product-showcase"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <script>
            $(document).ready(function() {
                var intervalId = setInterval(function() {
                    $('#nextBtn').click();
                }, 4000);

                // When the user clicks on the previous button, reset the timer
                $('.carousel-control-prev').click(function() {
                    clearInterval(intervalId);
                    intervalId = setInterval(function() {
                        $('#nextBtn').click();
                    }, 4000);
                });
            });
        </script>        
    </div>
