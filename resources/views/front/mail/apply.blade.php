<!DOCTYPE html>
<html>
<head>
    <title>Application Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #4CAF50;
        }
        .content {
            margin-bottom: 20px;
        }
        .content p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Application Details</h1>
        </div>
        <div class="content">
            <h3><strong>Apply For:</strong> {{ $mailData['apply_for'] }}</h3>
            <p><strong>Name:</strong> {{ $mailData['name'] }}</p>
            <p><strong>Email:</strong> {{ $mailData['email'] }}</p>
            <p><strong>Contact:</strong> {{ $mailData['contact'] }}</p>
            <p><strong>Instagram Account:</strong> {{ $mailData['social_media_account'] }}</p>
            <p><strong>Able to Travel:</strong> {{ $mailData['able_to_tarvel'] }}</p>
        </div>
        <div class="footer">
            <p>© 2024 LURE. All Rights Reserved..</p>
        </div>
    </div>
</body>
</html>