@extends('layouts.app')
@section('content')
<div style="height: 120vh" class="text-light-2">
    <div class="border1">
        <h1 class="tagline">Fresh Flavors, <br>
            Creative Catering</h1> <br>
        <h3 class="subtitle">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
        </h3>
        <div style="margin-top: 10vh" class="d-flex justify-content-center">
            <a href="{{route('products')}}" class="btn btn-danger px-4 py-2">See Our Menu</a>
        </div>
    </div>

</div>
<div style="height: 120vh" class="green-sec">
    <h1 class="tag2">WHAT WE DO</h1>
    <p class="cap1 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Drop Off<br>Catering</h2>
                    <p class="card-text">Sed porttitor lectus nibh. Curabitur non
                        nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus
                        orci</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Event<br>Staffing</h2>
                    <p class="card-text">Sed porttitor lectus nibh. Curabitur non
                        nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus
                        orci</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box2 card">
                <div class="card-body">
                    <h2 class="capcap card-title mb-5">Corporate<br>Events</h2>
                    <p class="card-text">Sed porttitor lectus nibh. Curabitur non
                        nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus
                        orci</p>
                    <button class="more-info">More Info</button>
                </div>
            </div>
        </div>
    </div>

</div>
<div style="height: 200vh" class="text-light-2">
    <div class="margin-box">
        <div style="height: 30vh; width: 150vh" class="red-sectagtag">
            <h1 class="tagtag">OUR MENU</h1>
            <p class="cap1">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
        <div>
            <div class="margin-box">
                <div style="height: 20vh; width: 150vh" class="white-sectagtag">
                    <h1 class="tagtag2">Wedding Meals</h1>
                </div>
                <div>
                    <div class="margin-box">
                        <div style="height: 20vh; width: 150vh" class="white-sectagtag">
                            <h1 class="tagtag2">Children's Party</h1>
                        </div>
                        <div>
                            <div class="margin-box">
                                <div style="height: 20vh; width: 150vh" class="white-sectagtag">
                                    <h1 class="tagtag2">Holiday Events</h1>
                                </div>
                                <div>
                                    <div class="margin-box">
                                        <div style="height: 20vh; width: 150vh" class="white-sectagtag">
                                            <h1 class="tagtag2">Filipino Fiesta Cuisine</h1>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="checkout_catering">
@if ($hasOrder)
<div class="mapView" id="mapView">
  
        Your Availed products
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
                        <input type="hidden" name="order_line_id" value={{$item['id']}}>
                        <input type="hidden" name="order_type" value="C">
                        <div id="input-number-error" style="color: red;"></div>
                        <input type="number" name="item_quantity" class="input-item-quantity" min="50"
                            id="item-quantity-{{$item['id']}}" value="{{$item['quantity']}}">
                    </form>

                </td>
                <td>{{$item['total_price']}}</td>
                <td>
                    <form action="/delete_order_line" method="POST">
                        @csrf
                        <input type="hidden" name="order_type" value="C">
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

        <form action="/buy" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{$order['id']}}">
            <div>
                Address: <br>
                <textarea type="text" name="address" id="address" rows=2 style="width:20vw;" required></textarea>
                <div id="map"></div>
            </div>
            <div class="col-6">
                <label for="date">Date and Time of Catering Service</label>
                <input id="date" name="date" class="form-control" type="datetime-local" />
            </div>

            <br><br>
            <button class="btn btn-success">Buy Now!</button>
        </form>
        <form action="/cancel_all_orders" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{$order['id']}}">
            <button type="submit">
                <i class="bi bi-trash-fill"></i>
            </button>
        </form>
    </div>
</div>
@endif

@endsection
@section('javascript')
<script>
    $(document).ready(function(){
        @if($scroll)
        setTimeout(() => {
            $('html, body').animate({
            scrollTop: $('#checkout_catering').offset().top
            }, 'slow');
        }, 500);
        @endif

    })    
</script>
@endsection