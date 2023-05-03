@extends('layouts.app')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{ asset('assets/product_assets/'.$product['gallery']) }}" class="detail-img">
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h2>{{$product['name']}}</h2>
            <h3>Price: {{$product['price']}}</h3>
            <h4>Details: {{$product['description']}}</h4>`
            <h4>Category: {{$category['name']}}</h4>
            <br><br>
            <form action="{{route('add_order')}}" method="POST" id="availProductForm">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>
                <input type="hidden" name="order_type" value="" id="orderType">
                <div class="form-group has-danger">
                    <div class="form-control-feedback text-danger" id="invalidQty"></div>
                    <input type="number" name="quantity" value=1 min=1 id="availProductQuantity"
                        class="form-control form-control-danger" required>
                </div>
                <button class="btn btn-primary" id="addToOrder">Add to Order</button>
                <button class="btn btn-primary" id="addToCatering">Add to Catering</button>
                <button class="btn btn-primary" id="addToReservations">Add to Reservations</button>
            </form>
        </div>
    </div>
</div>
@endsection