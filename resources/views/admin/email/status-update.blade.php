<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Approval Notification</title>
    <style>
        /* Basic CSS styling for the email content */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .message {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #e9f5ea;
            border-left: 5px solid #4CAF50; /* Green color */
        }
        .signature {
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="message">
        <p>Dear {{$prod->name}},</p>
        <p>Your account status has been approved.</p>
        <p><strong>Status:</strong> <span style="color: green">Approved</span></p>
        <p>You can now access your account.</p>
        <br>
        <p>Thank you.</p>
        <p>Tea Nature Team</p>
    </div>
    <p class="signature">Best regards,<br>Tea Nature Team</p>
</div>
</body>
</html>
