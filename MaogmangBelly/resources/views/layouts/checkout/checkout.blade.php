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
            <input type="text" name="address" id="address" required>
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
