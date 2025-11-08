<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Global Reset */
        body {
            font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
            background-color: #f2f7f3;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .invoice-wrapper {
            max-width: 750px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        /* Header Section */
        .invoice-header {
            background: linear-gradient(135deg, #15803d, #16a34a);
            color: #fff;
            padding: 25px;
            text-align: center;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 26px;
            letter-spacing: 1px;
        }
        .invoice-header p {
            margin: 5px 0 0;
            font-size: 14px;
        }

        /* Invoice Content */
        .invoice-body {
            padding: 25px 30px;
        }
        .invoice-body h2 {
            font-size: 20px;
            margin-top: 0;
            color: #14532d;
            border-bottom: 2px solid #d1fae5;
            padding-bottom: 5px;
        }
        p {
            margin: 5px 0;
            font-size: 14px;
            color: #444;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 10px;
            text-align: left;
            font-size: 14px;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            background-color: #ecfdf5;
            color: #065f46;
            font-weight: 600;
        }
        tr:hover {
            background-color: #f0fdf4;
        }

        /* Totals */
        .total {
            text-align: right;
            font-weight: 600;
            padding-top: 10px;
            font-size: 15px;
        }
        .highlight {
            color: #16a34a;
            font-weight: bold;
        }

        /* Footer */
        .invoice-footer {
            background: #f9fafb;
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        .invoice-footer a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .invoice-body, .invoice-header, .invoice-footer {
                padding: 20px;
            }
            table th, table td {
                font-size: 13px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="invoice-wrapper">
    <!-- Header -->
    <div class="invoice-header">
        <h1>Invoice #{{ $order->invoice_id }}</h1>
        <p>Thank you for your purchase!</p>
    </div>

    <!-- Body -->
    <div class="invoice-body">
        <h2>Customer Information</h2>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>

        @if(!$isGuest)
            <p><strong>Status:</strong> {{ ucfirst($order->order_status) }}</p>
            <p><strong>Address:</strong> {{ $order->shipping_address }}, {{ $order->shipping_city }}</p>
        @else
            <p><strong>Address:</strong> {{ $user->address }}, {{ $user->city }} - {{ $user->zip }}</p>
        @endif

        <h2>Order Details</h2>
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
            @php $total = 0; @endphp
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

        <p class="total"><strong>Delivery Charge:</strong> {{ number_format($deliveryCharge, 2) }} Tk</p>
        <p class="total"><span class="highlight">Total Payable: {{ number_format($total, 2) }} Tk</span></p>
    </div>

    <!-- Footer -->
    <div class="invoice-footer">
        <p>Need help? Contact us at <a href="mailto:teanaturelimited@gmail.com">teanaturelimited@gmail.com</a></p>
        <p>© {{ date('Y') }} Trodev. All rights reserved.</p>
    </div>
</div>

</body>
</html>
