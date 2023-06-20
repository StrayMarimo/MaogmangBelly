@extends('layouts.app')
@section('content')
<div style="background-image: url({{Vite::image('no_orders_bg.jpg')}})" class="container-fluid noorders justify-content-center">
    <div class="card mx-auto mt-5" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">No Orders Yet</h5>
            <p class="card-text">You have not made any orders yet.</p>
            <a href="{{route('product.index')}}"class="btn btn-primary text-white" style="background-color: #dc3545; ">Make an Order</a>
        </div>
    </div>
</div>
@endsection