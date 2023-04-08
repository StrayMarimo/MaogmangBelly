@extends('layouts.app')
@section("content")
<div>
    <a href="/">Go Back</a> <br>
    CHECKOUT PAGE
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        @foreach ($orders as $item)
        <tr>
            <td>{{$item['product_name']}}</td>
            <td>{{$item['price']}}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{$item['total_price']}}</td>
        </tr>
        @endforeach
    </table>
    <div>
        Grand Total : {{$order['grand_total']}}
    </div>
    Delivery type:
    <form action="/buy" method="POST">
        @csrf
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
            Address: <br>
            <input type="text" name="address" id="address" required>
        </div>

        <br><br>
        <button class="btn btn-success">Buy Now!</button>
    </form>
</div>
@endsection
