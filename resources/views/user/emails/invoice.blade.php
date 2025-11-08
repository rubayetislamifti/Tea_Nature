<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .invoice-container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1, h2, h3 {
            color: #333;
        }
        p, td, th {
            color: #555;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #f2f2f2;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <h1>Invoice</h1>

    <p><strong>Customer Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email ?? 'N/A' }}</p>
    <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
    <p><strong>Order ID:</strong> {{ $order->invoice_id }}</p>
    <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>

    @if(!$isGuest)
        <p><strong>Order Status:</strong> {{ $order->order_status }}</p>
        <p><strong>Address:</strong> {{ $order->shipping_address }}</p>
        <p><strong>City:</strong> {{ $order->shipping_city }}</p>
    @else
        <p><strong>Address:</strong> {{ $user->address }}</p>
        <p><strong>City:</strong> {{ $user->city }} - {{ $user->zip }}</p>
    @endif

    <h2>Products</h2>
    <table>
        <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @php
            $total = 0;
        @endphp
        @foreach($products as $product)
            @php
                $lineTotal = $product->quantity * $product->product_price;
                $total += $lineTotal;
            @endphp
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ number_format($product->product_price, 2) }} Tk</td>
                <td>{{ number_format($lineTotal, 2) }} Tk</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @php
        $deliveryCharge = 0;
        $city = $isGuest ? $user->city : $order->shipping_city;
        $role = $isGuest ? 'users' : $order->roles;

        if ($role === 'users') {
            $deliveryCharge = ($city === 'Dhaka') ? $userDhaka->price : $userOut->price;
        } else {
            $deliveryCharge = ($city === 'Dhaka') ? $depoShip->price : $depoShipOut->price;
        }

        $total += $deliveryCharge;
    @endphp

    <p><strong>Delivery Charge:</strong> {{ $deliveryCharge }} Tk</p>
    <h3>Total Payable: {{ number_format($total, 2) }} Tk</h3>

</div>
</body>
</html>
