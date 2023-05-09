@extends('layouts.app')
@section('content')
<div style="height: 50rem; background-image: url({{Vite::image('catering_bg.png')}})" class=" text-light-2">
    <div class="border1 text-white">
        <h1 class="tagline" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5">Fresh Flavors, <br>
            Creative Catering</h1> <br>
        <h3 class="subtitle" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5">
            Experience fresh, creative catering that's unforgettable. 
            Our innovative dishes and modern twists on classics make your event a delicious memory.
        </h3>
        <div style="margin-top: 10vh" class="d-flex justify-content-center">
            <a href="#checkoutCatering" class="btn btn-danger px-4 py-2">Checkout Catering</a>
        </div>
    </div>

</div>
<div style="height: 50rem " class="green-sec">
    <h1 class="tag2">WHAT WE DO</h1>
    <p class="cap1 mb-5">We take pride in providing exceptional culinary experiences that are tailored to your unique tastes and preferences, <br>
    offering a wide range of catering services that are designed to make your event unforgettable.</p>

    <div class="row justify-content-around mx-5">
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Drop Off<br>Catering</h2>
                    <p class="card-text"> Our Drop Off Catering service offers delicious,
                         high-quality food delivered to your doorstep, 
                         so you can enjoy a stress-free event without sacrificing taste or quality.</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Event<br>Staffing</h2>
                    <p class="card-text">Let our experienced event staff take care of every detail at your next event,
                        so you can relax and enjoy the party. From setup to cleanup and everything in between,
                        our professional team is dedicated to ensuring that your event runs smoothly and seamlessly,
                        leaving you free to mingle with your guests and make memories that will last a lifetime.</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Corporate<br>Events</h2>
                    <p class="card-text">Elevate your corporate event with our exceptional catering services,
                        tailored to meet the unique needs and preferences of your business. 
                        From breakfast meetings to multi-day conferences, our team of culinary experts and event 
                        professionals is committed to delivering the highest level of service and quality, 
                        ensuring that your event is a success from start to finish.</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
    </div>

</div>
<div style="height: 200vh; background-image: url({{Vite::image('catering2_bg.png')}})" class="text-light-2">
    <div class="margin-box">
        <div style="height: fit-content; width: 75rem" class="red-sectagtag">
            <h1 class="tagtag">OUR MENU</h1>
            <p class="cap1">Explore our diverse menu of fresh and flavorful dishes, crafted with the finest ingredients and inspired<br> by culinary traditions from around the world.</p>
        </div>
        <div>
            <div class="margin-box">
                <div style="height: fit-content; width: 75rem" class="white-sectagtag">
                    <h1 class="tagtag2">Wedding Meals</h1>
                </div>
                <div>
                    <div class="margin-box">
                        <div style="height: fit-content; width: 75rem" class="white-sectagtag">
                            <h1 class="tagtag2">Children's Party</h1>
                        </div>
                        <div>
                            <div class="margin-box">
                                <div style="height: fit-content; width: 75rem" class="white-sectagtag">
                                    <h1 class="tagtag2">Holiday Events</h1>
                                </div>
                                <div>
                                    <div class="margin-box">
                                        <div style="height: fit-content; width: 75rem" class="white-sectagtag">
                                            <h1 class="tagtag2">Filipino Fiesta Cuisine</h1>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.catering.catering_checkout')
@endsection
@section('javascript')
<script>
    $(document).ready(function(){
        @if($scroll)
            $('html, body').animate({
            scrollTop: $('#checkout_catering').offset().top
            }, 'slow');

        @endif

    })    
</script>
@endsection