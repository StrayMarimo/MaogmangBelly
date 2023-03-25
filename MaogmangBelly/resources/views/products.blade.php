@extends('layouts.app')
@section("content")

<div class="row d-flex justify-content-center m-2">
    <div class="custom-product col-6">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($products as $item)
                <div class="carousel-item {{$item['id'] == 1 ? 'active' : ''}}">
                    <a href="details/{{$item['id']}}">
                        <img class="slider-img w-100 px-5" src="{{$item['gallery']}}" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block slider-text">
                            <h5>{{$item['name']}}</h5>
                            <p>{{$item['description']}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev mx-5" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next mx-5" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="trending-warapper">
        <h3>Trending Products</h3>
        @foreach ($products as $item )
        <div class="trending-item col-5">
            <a href="details/{{$item['id']}}">
                <img src="{{$item['gallery']}}" class="trending-image mx-auto d-block">
                <div>
                    <h6 class="text-center">{{$item['name']}}</h6>
                </div>
            </a>
        </div>

        @endforeach
    </div>
</div>

@endsection