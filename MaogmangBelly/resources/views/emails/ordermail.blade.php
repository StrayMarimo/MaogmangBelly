<!DOCTYPE html>
<html>

<head>
    <h2>Order Confirmation</h2>
</head>

<body>
    <p>Hello {{ $mailData['fname'] }}!</p>

    <p class="fs-4">This is to confirm your order: </p> 
    <p>ID : {{ $mailData['orderid'] }}</p>
    <p>Order Type : {{ $mailData['orderType'] }}</p>
    <h4>Products Ordered</h4>
    <table class="table table-borderless">
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
                    <td>{{ $mailData['orders']['product_id'] }}</td>
                </tr>
            @endfor
        </tbody>

    </table>
    <p>Your order will arrive shortly. Thank you!</p>
</body>

</html>
