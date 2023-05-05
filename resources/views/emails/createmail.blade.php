<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $details['title'] }}</title>
</head>
<body>
<h1>Thank you for submitting a support ticket</h1>
<p>Dear {{ $details['name'] }},</p>
<p>We have received your support ticket with the following details:</p>
<ul>
    <li><strong>Reference Number:</strong> {{ $details['reference'] }}</li>
    <li><strong>Email:</strong> {{ $details['email'] }}</li>
    <li><strong>Phone Number:</strong> {{ $details['phone'] }}</li>
    <li><strong>Problem Description:</strong> {{ $details['message'] }}</li>
</ul>
<p>We will look into your issue and get back to you as soon as possible.</p>
<p>Now Ticket Status is  <b>{{ $details['status'] }}</b></p>
<p>Thank you for your patience and understanding.</p>
<p>Best regards,</p>
<p>The Support Team</p>
</body>
</html>
