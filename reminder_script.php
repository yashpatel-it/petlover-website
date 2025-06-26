<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "petlover");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get current time and check for bookings 30 minutes ahead
$query = "SELECT * FROM bookings WHERE 
          TIMESTAMP(reservation_date, reservation_time) = DATE_ADD(NOW(), INTERVAL 30 MINUTE)";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $phone = $row['phoneno'];
        $service = $row['service'];
        $booking_time = $row['reservation_time'];

        // SMS Message
        $message = "Reminder: Your $service booking is scheduled at $booking_time. Please be ready!";

        // Send SMS
        sendSMS($phone, $message);
    }
}

$conn->close();

// Function to send SMS using Fast2SMS API
function sendSMS($phone, $message)
{
    $api_key = "YOUR_FAST2SMS_API_KEY";  // Replace with your actual API key
    $sender_id = "FSTSMS";
    $route = "p"; // Promotional or transactional
    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=$api_key&sender_id=$sender_id&message=" . urlencode($message) . "&language=english&route=$route&numbers=$phone";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
