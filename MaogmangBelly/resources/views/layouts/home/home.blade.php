@extends('layouts.app')
@section('content')
<div class="text-light" style="height: 120vh; background-image: url({{Vite::image('home_bg.jpg')}});" width=100%>
    <div class="border1">
        <h1 class="tagline">Satisfy your cravings, <br>
            Have a Maogmang Belly</h1> <br>
        <h3 class="subtitle">Maogma <br>
            /'ma-ogma, 'ugma/ <br>
            <span style="color: #f4e3b2">adjective</span> <br>
            &nbsp &nbsp &nbsp &nbsp &nbsp
            Happy, feeling or showing pleasure or contentment.
        </h3>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="mb-3" style="justify-content: center; display: flex">
            <a class="btn btn-primary" href="{{route('product.index')}}" role="button" style="font-family: Lexend; text-align: center; background: #a72322; width: 15vw; border-radius: 30px; color:white !important;">Order Now</a>
        </div>
    </div>
</div>
<div style="height: 60vh" class="red-sec">
    <h1 class="tag1">DISCOVER QUALITY<br>FOOD</h1>
    <p class="cap1">Explore a world of flavor with every click. <br>
        Welcome to our new online home!</p>
</div>
<div style="height: 120vh" class="green-sec">
    <h1 class="tag2">TESTIMONIALS</h2>
        <p class="cap1 mb-5">
            Here's what our <span class="text-yellow">lovely </span>critics
            tell about us
        </p>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{Vite::image('customer1.jpg')}}" class="d-block w-100 brightness" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 style="font-family: 'Lexend';">Gordon Ramsey</h1>
            <p class="cap1 mb-2">I had the pleasure of dining at this restaurant the other day and it was an absolute delight. 
                From start to finish, the experience was impeccable.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="{{Vite::image('customer3.jpg')}}"  class="d-block w-100 brightness" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 style="font-family: 'Lexend';">Keith Lee</h1>
            <p class="cap1 mb-2"> I highly recommend this restaurant to anyone who loves great food, great service, and a great atmosphere. 
                It's a true gem and I can't wait to come back again. 10/10.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="{{Vite::image('customer2.jpg')}}" class="d-block w-100 brightness" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 style="font-family: 'Lexend';">Anton Ego</h1>
            <p class="cap1 mb-2">Every dish was a work of art, perfectly executed and bursting with flavor. I started with the lobster bisque, 
                and I must say, it was one of the best I've ever had. The depth of flavor was stunning, and the texture was perfectly velvety.</p>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>
@endsection
