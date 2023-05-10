@extends('layouts.app')
@section('content')
<div class="about" style="background-image: url({{Vite::image('about_bg.jpg')}}) ">
    <div class="container-fluid text-left p-5">
        <div class="about-box mx-auto">
            <div class="row mx-5">
                <div class="col">
                    <p class="we-are mb-4">We are</p>
                    <p class="brandname">MAOGMANG BELLY</p>
                    <p class="story">
                     Once a small corner deli, our restaurant has now become a beloved establishment in the 
                     heart of the community. It all started with a family's passion for food and a desire to share it with others.
                     <br>
                     <br>
                     Our founder, Leslie, grew up in a family of chefs and bakers who instilled in her a love for cooking and a respect for 
                     quality ingredients. When she moved to this town, Leslie noticed a lack of good, affordable dining options, and decided 
                     to take matters into her own hands.
                     <br>
                     <br>
                     As word spread about the delicious food and friendly service, the restaurant quickly gained a loyal following. 
                     Leslie's family and staff members take pride in getting to know their customers and treating them like family. 
                     They believe that a meal is not just about the food, but also about the company and the memories created around the table.
                    </p>
                </div>
                <div class="col">
                    <div class="col2">
                        <img src={{Vite::image('logo.png')}} width=500px; class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection