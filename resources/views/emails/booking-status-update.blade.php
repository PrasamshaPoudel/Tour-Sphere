<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status Update - Tour Sphere Nepal</title>
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
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
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
        .status-update {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #8b5cf6;
        }
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            margin: 5px;
        }
        .status-confirmed {
            background: #d1fae5;
            color: #065f46;
        }
        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }
        .status-completed {
            background: #dbeafe;
            color: #1e40af;
        }
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        .highlight {
            background: #f3f4f6;
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
            background: #8b5cf6;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🏔️ Tour Sphere Nepal</h1>
        <h2>Booking Status Update</h2>
    </div>

    <div class="content">
        <h3>Dear {{ $booking->user->name }},</h3>
        
        <p>We have an important update regarding your booking with Tour Sphere Nepal.</p>

        <div class="status-update">
            <h4>📋 Booking Status Change</h4>
            <p><strong>Booking Reference:</strong> TS-{{ strtoupper(substr(md5($booking->id), 0, 8)) }}</p>
            <p><strong>Status Changed From:</strong> 
                <span class="status-badge status-{{ $oldStatus }}">{{ ucfirst($oldStatus) }}</span>
            </p>
            <p><strong>Status Changed To:</strong> 
                <span class="status-badge status-{{ $newStatus }}">{{ ucfirst($newStatus) }}</span>
            </p>
        </div>

        <div class="highlight">
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
            </table>
        </div>

        @if($newStatus === 'confirmed')
        <div class="highlight">
            <h4>🎉 Congratulations! Your booking is confirmed!</h4>
            <ul>
                <li>Your adventure is officially confirmed</li>
                <li>You will receive detailed itinerary 7 days before travel</li>
                <li>Our team will contact you for payment details</li>
                <li>Any special requests will be accommodated</li>
            </ul>
        </div>
        @elseif($newStatus === 'cancelled')
        <div class="highlight">
            <h4>❌ Booking Cancelled</h4>
            <ul>
                <li>Your booking has been cancelled as requested</li>
                <li>Refund will be processed within 5-7 business days</li>
                <li>If you have any questions, please contact us</li>
                <li>We hope to serve you again in the future</li>
            </ul>
        </div>
        @elseif($newStatus === 'completed')
        <div class="highlight">
            <h4>✅ Trip Completed</h4>
            <ul>
                <li>Thank you for choosing Tour Sphere Nepal!</li>
                <li>We hope you had an amazing experience</li>
                <li>Please share your feedback with us</li>
                <li>We look forward to your next adventure</li>
            </ul>
        </div>
        @endif

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('booking.form') }}" class="btn">View My Bookings</a>
        </div>

        <div class="highlight">
            <h4>📧 Need Help?</h4>
            <p>If you have any questions about this status change, please contact us:</p>
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



