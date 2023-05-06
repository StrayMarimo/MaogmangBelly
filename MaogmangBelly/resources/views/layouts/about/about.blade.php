@extends('layouts.app')
@section('content')
<div class="about" style="background-image: url({{Vite::image('about_bg.jpg')}}) ">
    <div class="container-fluid text-left p-5">
        <div class="about-box mx-auto">
            <div class="row mx-5">
                <div class="col">
                    <p class="we-are">We are</p>
                    <p class="brandname">MAOGMANG BELLY</p>
                    <p class="story">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed orci nibh, maximus a interdum eget, tempor a est. Etiam eleifend, nibh a commodo porttitor, 
                        dolor enim dapibus orci, sit amet posuere dui magna ac mi. Fusce dapibus commodo dignissim. Nullam non libero orci. Proin suscipit, risus vitae sollicitudin 
                        imperdiet, turpis ex dapibus sapien, id blandit velit nisl quis odio. Nullam vitae bibendum urna, nec pulvinar odio. Cras aliquet turpis sed erat luctus, a 
                        suscipit est laoreet. Sed vel consectetur leo. Aenean rutrum, arcu condimentum eleifend volutpat, ligula orci placerat arcu, finibus cursus turpis sem molestie 
                        mauris. Morbi et libero turpis. Sed varius sapien augue. Nullam libero quam, bibendum ut finibus ut, tempor at arcu. Mauris iaculis, purus vel sollicitudin 
                        congue, est urna hendrerit nibh, vel ullamcorper velit nulla eget enim. Nullam posuere libero maximus dolor ultrices consectetur. Pellentesque tincidunt nisi 
                        sit amet lectus pulvinar viverra. Nullam ultrices sem ac mattis pharetra.
                    </p>
                </div>
                <div class="col">
                    <div class="col2">
                        <img src={{Vite::image('logo.png')}} class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection