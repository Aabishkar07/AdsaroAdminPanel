<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #00466a;
        }
        .details {
            margin-top: 20px;
            color: #333;
        }
        .details p {
            font-size: 1.1em;
            margin: 10px 0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #888;
            font-size: 0.9em;
        }
        .footer a {
            color: #00466a;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Enquiry!</h1>

        <div class="details">
            <p>Hello, <strong>{{ $mailData['name'] }}</strong></p>
            <p>Email: <strong>{{ $mailData['email'] }}</strong></p>
            <p>Subject: <strong>{{ $mailData['subject'] }}</strong></p>
            <p>Message: <strong>{{ $mailData['message'] }}</strong></p>
            {{-- <p>Phone: <strong>{{ $mailData['phone'] }}</strong></p> --}}
        </div>

        <div class="footer">
            <p>&copy; 2025 Adsaro. All Rights Reserved.</p>
            <p><a href="mailto:info@Adsaro.com">Contact Us</a> | <a href="https://Adsaro.com">Visit Our Website</a></p>
        </div>
    </div>
</body>
</html>
