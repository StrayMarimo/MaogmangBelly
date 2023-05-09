<!DOCTYPE html>
<html>

<head>
    <h2>Order Confirmation</h2>
</head>

<body>
    <p>Greetings Customer!</p>

    <p class="fs-4">This is to confirm your order with Order ID : {{ $mailData['orderid'] }}</p>
    <h4>Products Ordered</h4>
    {{-- <table class="table table-borderless">
        <thead>
            <tr>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < $mailData['order_count']; $i++)
                <tr>
                    <td class="orderHistory{{ $order['id'] }}" id="productName{{ $i }}"></td>
                    <td class="orderHistory{{ $order['id'] }}" id="unitPrice{{ $i }}"></td>
                    <td class="orderHistory{{ $order['id'] }}" id="quantity{{ $i }}"></td>
                    <td class="orderHistory{{ $order['id'] }}" id="totalPrice{{ $i }}"></td>
                </tr>
            @endfor
        </tbody>

    </table> --}}
    <p>Your order will arrive shortly. Thank you!</p>
</body>

</html>
