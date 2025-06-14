<!DOCTYPE html>
<html>
<head>
    <title>Order Shipped</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
        }
        .delivery-date {
            font-weight: bold;
            color: #FF6347;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Your Order Has Been Shipped!</h1>
    <p>Your order is scheduled to be delivered on <span class="delivery-date">{{ $deliveryDate }}</span>.</p>
    <div class="footer">
        <p>Thank you for shopping with us!</p>
        <p>If you have any questions, please contact our support team.</p>
    </div>
</div>
</body>
</html>
