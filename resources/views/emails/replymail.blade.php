<!DOCTYPE html>
<html>
<head>
    <title>Your Ticket Reply</title>
</head>
<body>
<h1>Your Ticket Reply</h1>
<p>Dear valued customer,</p>
<p>Thank you for contacting us. We are pleased to inform you that we have received your ticket and have resolved your issue.</p>
<p>Here are the details of your ticket:</p>
<ul>
    <li><strong>Ticket Reference ID:</strong> {{ $details['reference'] }}</li>
    <li><strong>Your Problem:</strong> {{ $details['description'] }}</li>
    <li><strong>Status:</strong> DONE</li>
    <li><strong>Our Reply:</strong> <strong>{{ $details['reply'] }}</strong></li>
</ul>
<p>If you have any further questions or concerns, please do not hesitate to contact us.</p>
<p>Thank you for your patience and cooperation.</p>
<p>Sincerely,</p>
<p>The Support Team</p>
</body>
</html>
