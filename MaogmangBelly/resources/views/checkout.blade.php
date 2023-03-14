@extends('master')
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
        </tr>
        @foreach ($orders as $item)
        <tr>
            <td>{{$item['product_name']}}</td>
            <td>{{$item['price']}}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{$item['total_price']}}</td>
        </tr>
        @endforeach
    </table>
   <div>
        Grand Total :  {{$order['grand_total']}} 
   </div>
  
</div>
@endsection