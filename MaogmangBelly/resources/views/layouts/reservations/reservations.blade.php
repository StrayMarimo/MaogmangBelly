@extends('layouts.app')
@section('content')
<div style="background-image: url({{Vite::image('reservation_bg.jpg')}})" class="container-fluid reservationbg">
    <div class="card" id="reservecard">
        <div class="text-center" id="checkout_reservations">
            <h1 class="contact-title" style="color: white">Reservation</h1>
        </div>
        @if($hasOrder)
        <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Name</h5>
        <div class="row g-3">
            <div class="col" style="font-family: 'Franklin Gothic Medium';">
                <input type="text" class="form-control" placeholder="First name" aria-label="First name"
                    value="{{Auth::user()->first_name}}" required>
            </div>
            <div class="col" style="font-family: 'Franklin Gothic Medium';">
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"
                    value="{{Auth::user()->last_name}}" required>
            </div>
        </div>
        <h5 class="mt-5 mb-3" style="color: white; font-family: 'Lexend';">Selected Products</h5>

        <div class="row">
            @foreach($orders as $product)
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card mx-4">
                    <form action="/delete_order_line" method="POST">
                        @csrf
                        <input type="hidden" name="order_type" value="R">
                        <input type="hidden" name="order_line_id" value="{{$product['id']}}">
                        <button type="submit" class="btn close-icon"><i class="bi bi-x-circle"></i></button>
                    </form>

                    <img src="{{ url('/assets/product_assets/'.$product['gallery']) }}" class="card-img-top"
                        style="height:30vh;">

                    <div class="card-body">
                        <div style="height: 4rem">
                            <h5 class="card-title">{{$product['product_name']}}</h5>
                        </div>

                        <p class="card-text">
                            <b> Product Price: </b> ₱{{$product['price']}}.00 <br>
                            <b> Total Price: </b> ₱{{$product['total_price']}}.00
                        </p>
                        <form action="/edit_order_qty" method="POST" id="edit-order-form-{{$product['id']}}">
                            @csrf
                            <input type="hidden" name="order_line_id" value={{$product['id']}}>
                            <input type="hidden" name="order_type" value="R">
                            <div id="input-number-error" style="color: red;"></div>
                            Quantity: <input type="number" name="item_quantity" class="input-item-quantity" min="10"
                                id="item-quantity-{{$product['id']}}" value="{{$product['quantity']}}">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-top: 10vh; margin-bottom: 5vh" class="d-flex justify-content-center">
            <a href="{{route('products')}}" class="btn btn-danger px-4 py-2">Reserve more products</a>
        </div>
        @else
        <h5 class="mt-5 mb-2 text-center" style="color: white; font-family: 'Lexend';">You have not made any
            reservations yet. </h5>
        <div style="margin-top: 10vh; margin-bottom: 5vh" class="d-flex justify-content-center">
            <a href="{{route('products')}}" class="btn btn-danger px-4 py-2">Reserve products</a>
        </div>
        @endif
        @if($hasOrder)
        @include('layouts.reservations.reservation_confirm')
        <form action="/buy" method="POST" id="checkoutReservationForm">
            @csrf
            <input type="hidden" name="order_id" value="{{$order['id']}}">
            <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Address: </h5>
            <div class="mt-2 mb-2i">
                <div class="mapView mb-3" id="mapView">
                    <textarea type="text" name="address" id="address" rows=2
                        style="width:88vw; font-family: 'Franklin Gothic Medium';"
                        placeholder="Pin your location in the map..." required></textarea>
                    <div id="map" style="width: 88vw;"></div>
                </div>
                <label for="date" style="color: white; font-family: 'Lexend';">Choose Date and Time for
                    Reservation:</label>
                <input type="datetime-local" id="date" name="date" required>
                <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Comment</h5>
                <div class="form-floating">
                    <textarea class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea2"
                        name="comment" style="height: 100px"></textarea>
                    <label for="floatingTextarea2" style="font-family: 'Franklin Gothic Medium';">Comments</label>
                </div>
                <h3 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Total: ₱{{$order['grand_total']}}.00
                </h3>
                <div class="mt-3 mb-2 row d-flex justify-content-center">
                    <button class="contact-red btn" id="confirmReservationBtn"
                        style="border: 2px solid #A72322; color: white; font-family: 'Lexend';">Buy Now</button>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
<x-toaster />

@endsection
@section('javascript')
<script>
    $(document).ready(function(){
        @if($scroll)
            $('html, body').animate({
            scrollTop: $('#checkout_reservations').offset().top
            }, 'slow');
        @endif
    })
</script>
@endsection