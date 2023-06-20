@extends('layouts.app')
@section("content")
<div class="container px-4 px-lg-5 my-5" style="font-family:'Lexend';">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 shadow-lg"
                src="{{ asset('assets/product_assets/'.$product['gallery']) }}" style="border-radius: 1rem; object-fit: cover; max-width: 100%; max-height: 50%"></div>
        <div class="col-md-6">
            <div class="small mb-1 text-capitalize">Category: {{$category['name']}}</div>
            <h1 class="display-5 fw-bolder">{{$product['name']}}</h1>
            <div class="fs-5 mb-5">
                ₱{{$product['price']}}.00
            </div>
            <p class="lead">{{$product['description']}}</p>
            <form action="{{route('orders.store')}}" method="POST" id="availProductForm">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>
                <input type="hidden" name="order_type" value="" id="orderType">
                <div class="d-flex">
                    <input class="form-control text-center me-3" name="quantity" min=1 id="availProductQuantity" type="number" value=1
                        style="min-width: 5rem">
                    <button class="btn btn-primary flex-shrink-0 text-white mx-2" type="button" id="addToOrder" style="border-radius: 20px; background-color:#dc3545">
                        Add to Order
                    </button>
                    <button class="btn btn-outline-dark flex-shrink-0 text-white mx-2" type="button" id="addToCatering" style="border-radius: 20px; background-color:#dc3545"">
                        Add to Catering
                    </button>
                    <button class="btn btn-outline-dark flex-shrink-0 text-white mx-2" type="button" id="addToReservations" style="border-radius: 20px; background-color:#dc3545"">
                        Add to Reservations
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-toaster />
@endsection