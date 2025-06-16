<!DOCTYPE html>
<html>
<head>
    <title>Account Under Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f2f2f2;
        }
        h1, p {
            color: #333;
        }
        .countdown-container {
            margin-top: 50px;
            font-size: 24px;
        }
        #countdown {
            font-weight: bold;
            color: #e74c3c;
        }
    </style>
    <script>
        var countdown = 10;
        var timer = setInterval(function() {
            countdown--;
            document.getElementById('countdown').innerHTML = countdown;
            if (countdown <= 0) {
                clearInterval(timer);
                window.location.href = "{{ route('home') }}";
            }
        }, 1000); // Update every second (1000 milliseconds)
    </script>
</head>
<body>
<h1>Your account is under review.</h1>
<p>You will receive a notification to access your account.</p>
<div class="countdown-container">
    <p>You will be redirected to the home page shortly (<span id="countdown">10</span> seconds).</p>
</div>
</body>
</html>
