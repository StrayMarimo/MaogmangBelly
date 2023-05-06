@extends('layouts.app')
@section("content")
<div class="container px-4 px-lg-5 my-5" style="font-family:'Lexend';">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 shadow-lg"
                src="{{ asset('assets/product_assets/'.$product['gallery']) }}" style="border-radius: 1rem; max-width: 30vw; max-height: 30vh"></div>
        <div class="col-md-6">
            <div class="small mb-1 text-capitalize">Category: {{$category['name']}}</div>
            <h1 class="display-5 fw-bolder">{{$product['name']}}</h1>
            <div class="fs-5 mb-5">
                ₱{{$product['price']}}.00
            </div>
            <p class="lead">{{$product['description']}}</p>
            <form action="{{route('add_order')}}" method="POST" id="availProductForm">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>
                <input type="hidden" name="order_type" value="" id="orderType">
                <div class="d-flex">
                    <input class="form-control text-center me-3" name="quantity" min=1 id="availProductQuantity" type="number" value=1
                        style="min-width: 5rem">
                    <button class="btn btn-primary flex-shrink-0 text-white mx-2" type="button" id="addToOrder" style="border-radius: 20px;">
                        Add to Order
                    </button>
                    <button class="btn btn-outline-dark flex-shrink-0 text-white mx-2" type="button" id="addToCatering" style="border-radius: 20px;">
                        Add to Catering
                    </button>
                    <button class="btn btn-outline-dark flex-shrink-0 text-white mx-2" type="button" id="addToReservations" style="border-radius: 20px;">
                        Add to Reservations
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Minimum required toaster --}}
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="minRequiredToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto text-danger">Warning</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
           
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{ asset('assets/product_assets/'.$product['gallery']) }}" class="detail-img">
        </div>
        <div class="col-sm-6">
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
</div> --}}
@endsection