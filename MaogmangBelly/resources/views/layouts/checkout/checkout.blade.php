@extends('layouts.app')
@section("content")
<div id="mapView">
    <a href="/">Go Back</a> <br>
    <div style="background-image: url({{Vite::image('reservation_bg.jpg')}})" class="container-fluid reservationbg">
        <div class="card mb-3" id="reservecard" style="color:white; font-family: 'Lexend';">
            <div class="text-center" id="checkout_reservations">
                <h1 class="contact-title" style="color: white">Checkout</h1>
            </div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th></th>
                </tr>
                @foreach ($orders as $item)
                @if($item['quantity'] > 0)
                <tr>
                    <td>{{$item['product_name']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>
                        <form action="/edit_order_qty" method="POST" id="edit-order-form-{{$item['id']}}">
                            @csrf
                            <input type="hidden" name="order_type" value="O">
                            <input type="hidden" name="order_line_id" value={{$item['id']}}>
                            <input type="number" name="item_quantity" min="1" class="input-item-quantity"
                                id="item-quantity-{{$item['id']}}" value="{{$item['quantity']}}">
                        </form>

                    </td>
                    <td>{{$item['total_price']}}</td>
                    <td>
                        <form action="/delete_order_line" method="POST">
                            @csrf
                            <input type="hidden" name="order_type" value="O">
                            <input type="hidden" name="order_line_id" value="{{$item['id']}}">
                            <button type="submit">
                                <i class="bs bi-trash-fill" id="delete-order-line"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
            <div>
                Grand Total : {{$order['grand_total']}}
            </div>
            <form class="ml-3" action="/buy" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{$order['id']}}">
                <br>Delivery type:
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="forDelivery" id="forDelivery" checked>
                    <label class="form-check-label" for="forDelivery">
                        For Delivery
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="forPickUp" id="forPickup">
                    <label class="form-check-label" for="forPickup">
                        For pick up
                    </label>
                </div>
                <div id="addressPicker">
                    <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Address: </h5>
                    <div class=" mapView mt-3 mb-2" id="mapView">
                        <textarea class="type=" text" name="address" id="address" rows=2
                            style="width:88vw; font-family: 'Franklin Gothic Medium';"
                            placeholder="Pin your location in the map..." required></textarea>
                        <div id="map" style="width: 88vw;" class="mb-2"></div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-success mt-3">Buy Now!</button>
                </div>

            </form>
            <form action="/cancel_all_orders" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{$order['id']}}">
                <button class="btn btn-danger mt-2">Cancel this order.</button>
            </form>
        </div>
    </div>
</div>
@endsection