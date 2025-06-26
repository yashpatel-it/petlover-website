<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (isset($_POST['cancel_all'])) {
        // Delete all adoption requests for the user
        $delete_query = "DELETE FROM consultations WHERE email='$email'";
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('All requests canceled successfully!'); window.location.href='user_profile.php';</script>";
        } else {
            echo "Error canceling adoption requests: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['cancel_first'])) {
        // Delete only the first (oldest) adoption request for the user
        $delete_query = "DELETE FROM consultations WHERE email='$email' ORDER BY id ASC LIMIT 1";
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Oldest request canceled successfully!'); window.location.href='user_profile.php';</script>";
        } else {
            echo "Error canceling first request: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Invalid request.'); window.location.href='cancel_consult.php?email=$email';</script>";
    }
} elseif (isset($_GET['email'])) {
    $email = mysqli_real_escape_string($conn, $_GET['email']);

    // Fetch all bookings for the given email
    $query = "SELECT * FROM consultations WHERE email='$email' ORDER BY id ASC";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        die("No bookings found for this email.");
    }
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel consultations Request</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Body Styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #66ccff, rgb(204, 85, 0));
        }

        /* Container Styling */
        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            text-align: center;
            animation: fadeIn 0.6s ease-in-out;
        }

        /* Heading */
        h2 {
            margin-bottom: 15px;
            color: #333;
            font-size: 22px;
            font-weight: bold;
        }

        /* Buttons */
        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        /* Cancel First Request */
        .cancel-first {
            background: #ff9800;
            color: white;
        }

        .cancel-first:hover {
            background: #e68900;
            transform: scale(1.05);
        }

        /* Cancel All Requests */
        .cancel-all {
            background: #e74c3c;
            color: white;
        }

        .cancel-all:hover {
            background: #c0392b;
            transform: scale(1.05);
        }

        /* Fade-In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 18px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cancel consultations Request</h2>

        <form method="POST">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <button type="submit" name="cancel_first" class="cancel-first">
                Cancel First Request
            </button>
        </form>

        <form method="POST">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <button type="submit" name="cancel_all" class="cancel-all" onclick="return confirm('Are you sure you want to cancel all bookings?');">
                Cancel All Requests
            </button>
        </form>
    </div>
</body>

</html>