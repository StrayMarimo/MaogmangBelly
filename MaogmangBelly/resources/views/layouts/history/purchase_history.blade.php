@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(session('failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<table>
    <tr>
        <th>Order Type</th>
        <th>Order Id</th>
        <th>Ordered On</th>
        <th>Total Price</th>
        <th>Delivery Type</th>
        <th>Status</th>
        <th></th>
    </tr>
    @foreach($orders as $order)
    <tr>
        @if ($order['order_type'] == 'O')
        <td>Order</td>
        @elseif($order['order_type'] == 'C')
        <td>Catering</td>
        @else
        <td>Reservation</td>
        @endif
        <td>{{$order['id']}}</td>
        <td>{{$order['date_purchased']}}</td>
        <td>₱{{$order['grand_total']}}.00</td>
        @if ($order['delivery_type'] == 'P')
        <td>For Pickup</td>
        @else
        <td>For Delivery</td>
        @endif
        @if($order['date_completed'] != null)
        <td>Completed</td>
        @else
        <td>Ongoing</td>
        @endif
        @if($isAdmin && $order['date_completed'] == null )
        <td>
            <form action="{{route('complete_order')}}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value={{$order['id']}}>
                <button type="submit" class="btn btn-danger px-4 py-2">Set Order as Completed</a>
            </form>

        </td>

        @endif
    </tr>
    @endforeach
</table>

@endsection