@extends('layouts.app')
@section("content")
<div id="mapView">
    <a href="/">Go Back</a> <br>
    CHECKOUT PAGE
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
                    <input type="hidden" name="order_line_id" value={{$item['id']}} >
                    <input type="number" name="item_quantity" class="input-item-quantity" id="item-quantity-{{$item['id']}}" value="{{$item['quantity']}}">
                </form>
               
            </td>
            <td>{{$item['total_price']}}</td>
            <td>
                <form action="/delete_order_line" method="POST">
                    @csrf
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
        Delivery type:
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
            <textarea type="text" name="address" id="address" rows=2 style="width:20vw;" required></textarea>
            <div id="map"></div>
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
@endsection
@section('javascript')
<script>
    var map = L.map('map').setView([13.6303, 123.1851], 18);
    var popup = L.popup();
    var marker = L.marker();
 
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    function onMapClick(e) {
        marker.setLatLng(e.latlng).addTo(map);
       
        console.log(e);
        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${e.latlng.lat}&lon=${e.latlng.lng}&format=json`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).then(res => res.json())
        .then(res => {
             $('#address').val(res.display_name);
            console.log(res.display_name)
            console.log(res.address)
            })
    }
    map.on('click', onMapClick);

</script>
@endsection