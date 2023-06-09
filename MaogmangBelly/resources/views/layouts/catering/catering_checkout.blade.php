<div id="checkoutCatering"></div>
<div style="height: fit-content; padding-bottom: 20vh" class=" green-sec">
    <div class="card" id="reservecard" style="color:white; font-family: 'Lexend';">
        <div class="text-center" id="checkout_catering">
            <h1 class="contact-title" style="color: white">Catering</h1>
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
                        <td>{{$item['name']}}</td>
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
                                <button type="submit" class="btn text-white">
                                    <i class="bs bi-trash-fill" id="delete-order-line"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
                <div style="margin-top: 10vh; margin-bottom: 5vh" class="d-flex justify-content-center">
                    <a href="{{route('product.index')}}" class="btn btn-danger px-4 py-2">Add more products</a>
                </div>
                <div>
                    Grand Total : {{$order['grand_total']}}
                </div>
                @include('layouts.catering.catering_confirm')
                <form action="/buy" method="POST" id="checkoutCateringForm">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$order['id']}}">
                    <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Address: </h5>
                    <div class="mt-2 mb-2i">
                        <div class="mapView mb-3" id="mapView">
                            <div id="checkoutAddress">
                                <textarea type="text" name="address" id="address" rows=2
                                    style="width:88vw; font-family: 'Franklin Gothic Medium';"
                                    placeholder="Pin your location in the map..." required></textarea>
                            </div>
                            <div id="map" style="width: 88vw;"></div>
                        </div>
                    </div>
                    <div class="col-6" id="cateringDate">
                        <label for="date">Date and Time of Catering Service</label>
                        <input id="date" name="date" class="form-control" type="datetime-local" />
                    </div>
                    <div id="invalidFoodQuantity" class="text-danger"></div>
                    <button class="btn btn-success mt-3" id="buyCateringBtn">Buy Now!</button>
                </form>
                <form action="/cancel_all_orders" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$order['id']}}">
                </form>
            </div>
            @else
            <h5 class="mt-5 mb-2 text-center" style="color: white; font-family: 'Lexend';">You have not availed products
                for catering yet.
            </h5>
            <div style="margin-top: 10vh; margin-bottom: 5vh" class="d-flex justify-content-center">
                <a href="{{route('product.index')}}" class="btn btn-danger px-4 py-2">Avail products</a>
            </div>
            @endif

        </div>
    </div>

</div>

<x-toaster />