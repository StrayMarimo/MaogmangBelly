@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
    </button>
</div>
@elseif(session('failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(count($orders) > 0)
<table class="mx-auto table align-middle" style="font-family: 'Lexend'">
    <thead class="table-dark text-center">
        <tr>
            <th>Order Type</th>
            <th>Order Id</th>
            <th>Ordered On</th>
            <th>Total Price</th>
            <th>Delivery Type</th>
            <th>Status</th>
            @if($isAdmin)
            <th >Options</th>
            @endif
            <th></th>

        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        @if($order['is_purchased'] == 1)
        <tr style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);" class="text-center">
            @if ($order['order_type'] == 'O')
            <td>Order</td>
            @elseif($order['order_type'] == 'C')
            <td>Catering</td>
            @else
            <td>Reservation</td>
            @endif
            <td>{{$order['id']}}</td>
            <td class="date-purchased">{{$order['updated_at']}}</td>
            <td>₱{{$order['grand_total']}}.00</td>
            @if ($order['delivery_type'] == 'P')
            <td>For Pickup</td>
            @else
            <td>For Delivery</td>
            @endif
            @if($order['date_completed'] != null)
            <td style="color:green;">Completed</td>
            @else
            <td style="color:darkgoldenrod">Ongoing</td>
            @endif
          
            @if($isAdmin)
            @if ($order['date_completed'] == null)
                <td>
                    <form action="{{route('orders.update', ['order' => $order['id'] ])}}" method="POST">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn px-4 py-2" style="color: white; background-color:#a72322; border-radius: 20px;">Set Order as Completed</a>
                    </form>

                </td>
            @else
            <td>
               <button type="submit" class="btn btn-dis px-4 py-2 disabled" style="border-radius: 20px;">Set Order as Completed</a>
            
            </td>
            @endif
            @endif
            <td>
                <button class="orderHistoryBtn btn" type="button" data-toggle="collapse" style="background-color: transparent"
                    data-target="#orderHistory{{$order['id']}}" aria-expanded="false" data-order-id="{{$order['id']}}"
                    aria-controls="orderHistory{{$order['id']}}"><i class="bi bi-caret-down-fill"></i>
                </button>
            </td>

        </tr>
        <tr>
            <td colspan="7">
                <div class="collapse" id="orderHistory{{$order['id']}}">
                    <table class="history table table-borderless table-hover">
                        <thead class="text-white"style="background-color: #a72322;">
                            <tr>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            @for ($i = 0; $i < $order['order_count']; $i++) <tr>
                                <td class="orderHistory{{$order['id']}}" id="productName{{$i}}"></td>
                                <td class="orderHistory{{$order['id']}}" id="unitPrice{{$i}}"></td>
                                <td class="orderHistory{{$order['id']}}" id="quantity{{$i}}"></td>
                                <td class="orderHistory{{$order['id']}}" id="totalPrice{{$i}}"></td>
                                @endfor
                        </tbody>

                    </table>

                </div>

            </td>
        </tr>

        @endif
        @endforeach
    </tbody>
</table>
@endif
@endsection