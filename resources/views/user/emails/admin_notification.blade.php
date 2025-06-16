<!DOCTYPE html>
<html>
<head>
    <title>New User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #f1f1f1;
            color: #777;
            text-align: center;
            padding: 10px;
            border-top: 1px solid #ddd;
        }
        .content h1 {
            color: #007bff;
        }
        .content p {
            line-height: 1.5;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>New Depo Registration</h1>
    </div>
    <div class="content">
        <p><strong>Name:</strong> {{ $depo->name }}</p>
        <p><strong>Email:</strong> {{ $depo->email }}</p>
        <p><strong>Status:</strong> {{ $depo->action }}</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </div>
</div>
</body>
</html>
