@extends('layouts.app')
@section('content')
<div style="height: 120vh; background-image: url({{Vite::image('catering_bg.jpg')}})"" class="text-light-2">
    <div class="border1">
        <h1 class="tagline">Fresh Flavors, <br>
            Creative Catering</h1> <br>
        <h3 class="subtitle">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
        </h3>
        <div style="margin-top: 10vh" class="d-flex justify-content-center">
            <a href="#checkoutCatering" class="btn btn-danger px-4 py-2">Checkout Catering</a>
        </div>
    </div>

</div>
<div style="height: 120vh" class="green-sec">
    <h1 class="tag2">WHAT WE DO</h1>
    <p class="cap1 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Drop Off<br>Catering</h2>
                    <p class="card-text">Sed porttitor lectus nibh. Curabitur non
                        nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus
                        orci</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Event<br>Staffing</h2>
                    <p class="card-text">Sed porttitor lectus nibh. Curabitur non
                        nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus
                        orci</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Corporate<br>Events</h2>
                    <p class="card-text">Sed porttitor lectus nibh. Curabitur non
                        nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus
                        orci</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
    </div>

</div>
<div style="height: 200vh" class="text-light-2">
    <div class="margin-box">
        <div style="height: 30vh; width: 150vh" class="red-sectagtag">
            <h1 class="tagtag">OUR MENU</h1>
            <p class="cap1">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
        <div>
            <div class="margin-box">
                <div style="height: 20vh; width: 150vh" class="white-sectagtag">
                    <h1 class="tagtag2">Wedding Meals</h1>
                </div>
                <div>
                    <div class="margin-box">
                        <div style="height: 20vh; width: 150vh" class="white-sectagtag">
                            <h1 class="tagtag2">Children's Party</h1>
                        </div>
                        <div>
                            <div class="margin-box">
                                <div style="height: 20vh; width: 150vh" class="white-sectagtag">
                                    <h1 class="tagtag2">Holiday Events</h1>
                                </div>
                                <div>
                                    <div class="margin-box">
                                        <div style="height: 20vh; width: 150vh" class="white-sectagtag">
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