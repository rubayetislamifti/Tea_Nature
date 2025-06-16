<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        p {
            margin: 5px 0;
            color: #555;
        }
        h2 {
            margin-top: 30px;
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        strong {
            color: #333;
        }
        h3 {
            margin-top: 20px;
            color: #333;
        }
        .invoice-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <h1 style="color: #333; border-bottom: 2px solid #333; padding-bottom: 10px;">Invoice</h1>

    <div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; border-radius: 8px;">
        <p style="margin: 10px 0;">
            <strong style="color: #555;">User name:</strong>
            <span style="color: #333;">{{$user->name}}</span>
        </p>
        <p style="margin: 10px 0;">
            <strong style="color: #555;">Order ID:</strong>
            <span style="color: #333;">{{ $order->id }}</span>
        </p>
        <p style="margin: 10px 0;">
            @if($order->transaction_id)
                <strong style="color: #555;">Transaction ID:</strong>
                <span style="color: #333;">{{ $order->transaction_id }}</span>
            @endif
        </p>
        <p style="margin: 10px 0;">
            <strong style="color: #555;">Payment Method:</strong>
            <span style="color: #333;">{{ $order->payment_method }}</span>
        </p>
        <p style="margin: 10px 0;">
            <strong style="color: #555;">Order Status:</strong>
            <span>
            {{ $order->order_status }}
        </span>
        </p>
        <p style="margin: 10px 0;">
            <strong style="color: #555;">Address:</strong>
            <span style="color: #333;">{{ $order->shipping_address }}</span>
        </p>
        <p style="margin: 10px 0;">
            <strong style="color: #555;">City:</strong>
            <span style="color: #333;">{{ $order->shipping_city }}</span>
        </p>
    </div>


    <!-- Add more details as necessary -->

    <h2>Products</h2>
    <table>
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @php
            $totalAmount = 0;
            $deliveryCharge = 0;
        @endphp
        @foreach($products as $product)
            @php
                $productTotal = $product->quantity * $product->product_price;
                $totalAmount += $productTotal;
            @endphp
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->product_price }} Tk.</td>
                <td>{{ $productTotal }} Tk.</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p><strong>Your Delivery Charges:</strong>
        @php
            if($order->roles === 'users') {
                if($order->shipping_city === 'Dhaka') {
                    $deliveryCharge = $userDhaka->price;
                } else {
                    $deliveryCharge = $userOut->price;
                }
            } else {
                if($order->shipping_city === 'Dhaka') {
                    $deliveryCharge = $depoShip->price;
                } else {
                    $deliveryCharge = $depoShipOut->price;
                }
            }
            $totalAmount += $deliveryCharge;
        @endphp
        <strong>{{ $deliveryCharge }} Tk.</strong>
    </p>

    <h3>Total Amount: {{ $totalAmount }} Tk.</h3>
</div>
</body>
</html>
