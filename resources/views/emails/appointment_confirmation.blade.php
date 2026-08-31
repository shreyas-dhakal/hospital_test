<!-- resources/views/emails/appointment_confirmation.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            margin: 0;
            color: #0056b3;
        }
        .content {
            margin: 20px 0;
        }
        .content p {
            margin: 10px 0;
        }
        .content ul {
            list-style-type: none;
            padding: 0;
        }
        .content ul li {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
              <a href="#" class="navbar-brand">
                <x-application-logo height="28" alt="DGH"/>
            </a>
            <h1>Appointment Confirmation</h1>
        </div>
        <div class="content">
            <p>Dear {{ $data['name'] }},</p>

            <p>You will be shortly contacted by our representatives. Here are the details of your appointment:</p>

            <ul>
                <li><strong>Name:</strong> {{ $data['name'] }}</li>
                <li><strong>Gender:</strong> {{ $data['gender'] }}</li>
                <li><strong>Email:</strong> {{ $data['email'] }}</li>
                <li><strong>Phone:</strong> {{ $data['phone'] }}</li>
                <li><strong>Department:</strong> {{ $data['department']->name }}</li>
                <li><strong>Doctor:</strong> {{ $data['doctor']->name }}</li>
            </ul>

            <p>Thank you for booking with us. We will contact you shortly regarding the appointment.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Dirghayu Hospital. All rights reserved.
        </div>
    </div>
</body>
</html>
