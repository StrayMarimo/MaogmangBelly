@extends('master')
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
            <h4>Details: {{$product['description']}}</h4>
            <h4>Category: {{$category['name']}}</h4>
            <br><br>
            <form action="/add_to_order" method="POST">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>
                <button class="btn btn-primary">Add to Order</button>
            </form>
            <br><br>
            <button class="btn btn-success">Buy Now!</button>
        </div>
    </div>
</div>
@endsection