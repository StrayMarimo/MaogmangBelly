@extends('layouts.app')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{$product['gallery']}}" class="detail-img">
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h2>{{$product['name']}}</h2>
            <h3>Price: {{$product['price']}}</h3>
            <h4>Details: {{$product['description']}}</h4>`
            <h4>Category: {{$category['name']}}</h4>
            <br><br>
            <form action="/add_to_order" method="POST">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>
                <input type="number" name="quantity" value=1>
                <button class="btn btn-primary">Add to Order</button>
            </form>
        </div>
    </div>
</div>
@endsection