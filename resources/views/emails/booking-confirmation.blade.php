<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Tour Sphere Nepal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8fafc;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .booking-details {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #3b82f6;
        }
        .highlight {
            background: #dbeafe;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
        }
        .btn {
            display: inline-block;
            background: #3b82f6;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            margin: 10px 0;
        }
        .status-pending {
            background: #fef3c7;
            color: #92400e;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🏔️ Tour Sphere Nepal</h1>
        <h2>Booking Confirmation</h2>
    </div>

    <div class="content">
        <h3>Dear {{ $booking->user->name }},</h3>
        
        <p>Thank you for choosing Tour Sphere Nepal for your adventure! We're excited to confirm your booking and look forward to providing you with an unforgettable experience.</p>

        <div class="highlight">
            <h4>📋 Booking Reference: {{ $bookingReference }}</h4>
            <p><strong>Status:</strong> <span class="status-pending">Pending Confirmation</span></p>
        </div>

        <div class="booking-details">
            <h4>🎯 Booking Details</h4>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px 0; font-weight: bold;">Destination:</td>
                    <td style="padding: 8px 0;">{{ $booking->destination->name }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; font-weight: bold;">Travel Date:</td>
                    <td style="padding: 8px 0;">{{ \Carbon\Carbon::parse($booking->travel_date)->format('F d, Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; font-weight: bold;">Number of People:</td>
                    <td style="padding: 8px 0;">{{ $booking->number_of_people }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; font-weight: bold;">Total Price:</td>
                    <td style="padding: 8px 0; font-size: 18px; color: #059669; font-weight: bold;">Rs {{ number_format($booking->price, 2) }}</td>
                </tr>
                @if($booking->special_requests)
                <tr>
                    <td style="padding: 8px 0; font-weight: bold;">Special Requests:</td>
                    <td style="padding: 8px 0;">{{ $booking->special_requests }}</td>
                </tr>
                @endif
            </table>
        </div>

        <div class="highlight">
            <h4>📞 What's Next?</h4>
            <ul>
                <li>Our team will review your booking within 24 hours</li>
                <li>You'll receive a confirmation call or email</li>
                <li>Payment details will be shared for final confirmation</li>
                <li>Detailed itinerary will be sent 7 days before travel</li>
            </ul>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('dashboard') }}" class="btn">View My Bookings</a>
        </div>

        <div class="highlight">
            <h4>📧 Need Help?</h4>
            <p>If you have any questions or need to make changes to your booking, please don't hesitate to contact us:</p>
            <ul>
                <li>📧 Email: bookings@toursphere.com</li>
                <li>📞 Phone: +977-1-1234567</li>
                <li>🌐 Website: <a href="{{ route('home') }}">www.toursphere.com</a></li>
            </ul>
        </div>
    </div>

    <div class="footer">
        <p>Thank you for choosing Tour Sphere Nepal!</p>
        <p>Your adventure awaits... 🏔️✨</p>
        <p><small>This is an automated email. Please do not reply to this address.</small></p>
    </div>
</body>
</html>












