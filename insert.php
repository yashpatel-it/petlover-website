<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petlover";

$conn = new mysqli($servername, $username, $password, $dbname);

$message = ""; // Variable to store messages
$message_type = ""; // Variable to store message type (success or error)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $service = $_POST['service'];
    $duration = $_POST['duration'];


    // Check if user exists in the database
    $user_check_query = "SELECT * FROM user WHERE email = ?";
    $user_stmt = $conn->prepare($user_check_query);
    $user_stmt->bind_param("s", $email);
    $user_stmt->execute();
    $user_result = $user_stmt->get_result();

    if ($user_result->num_rows === 0) {
        // User not registered
        $message = "Please login first for booking.";
        $message_type = "error";
    } else {
        // Check existing bookings for the selected date
        $check_query = "SELECT COUNT(*) as total_bookings FROM bookings WHERE reservation_date = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("s", $reservation_date);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['total_bookings'] >= 2) {
            $message = "Sorry, this date is fully booked. Please select another date.";
            $message_type = "error";
        } else {
            // Proceed with booking
            $insert_query = "INSERT INTO bookings (name, email, phoneno, reservation_date, reservation_time, service , duration) VALUES (?, ?, ?, ?, ?, ? , ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("sssssss", $name, $email, $phoneno, $reservation_date, $reservation_time, $service, $duration);

            if ($insert_stmt->execute()) {
                $message = "Booking successful!";
                $message_type = "success";
            } else {
                $message = "Error in booking. Please try again.";
                $message_type = "error";
            }

            $insert_stmt->close();
        }

        $stmt->close();
    }

    $user_stmt->close();
    $conn->close();

    // Redirect to booking.php with message
    header("Location: booking.php?message=" . urlencode($message) . "&type=" . urlencode($message_type));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
        .message {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
        }

        .success {
            color: green;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .error {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }
    </style>
    <script>
        function showMessage() {
            let messageBox = document.getElementById("messageBox");
            if (messageBox) {
                messageBox.style.display = "block";
                setTimeout(() => {
                    messageBox.style.display = "none";
                }, 2000); // Hide after 2 seconds
            }
        }
    </script>
</head>

<body onload="showMessage()">
    <?php if (!empty($message)) : ?>
        <div id="messageBox" class="message <?php echo $message_type; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</body>

</html>