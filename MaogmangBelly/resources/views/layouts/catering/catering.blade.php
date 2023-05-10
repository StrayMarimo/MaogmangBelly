@extends('layouts.app')
@section('content')
<div style="height: 50rem; background-image: url({{Vite::image('catering_bg.png')}})" width=100% class=" text-light-2">
    <div class="border1 text-white">
        <h1 class="tagline" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5">Fresh Flavors, <br>
            Creative Catering</h1> <br>
        <h3 class="subtitle" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
        </h3>
        <div style="margin-top: 10vh" class="d-flex justify-content-center">
            <a href="#checkoutCatering" class="btn btn-danger px-4 py-2">Checkout Catering</a>
        </div>
    </div>

</div>
<div style="height: 50rem " class="green-sec">
    <h1 class="tag2">WHAT WE DO</h1>
    <p class="cap1 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

    <div class="row justify-content-around mx-5">
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
<div style="height: 200vh; background-image: url({{Vite::image('catering2_bg.png')}})" class="text-light-2">
    <div class="margin-box">
        <div style="height: fit-content; width: 75rem" class="red-sectagtag">
            <h1 class="tagtag">OUR MENU</h1>
            <p class="cap1">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
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