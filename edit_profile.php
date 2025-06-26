<?php
require 'connect.php';
require 'track.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Update the user details
    $update_query = "UPDATE user SET FULLNAME='$fullname', PASSWORD='$password' WHERE EMAIL='$email'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='user_profile.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else if (isset($_GET['email'])) {
    $email = mysqli_real_escape_string($conn, $_GET['email']);

    // Fetch user details
    $query = "SELECT * FROM user WHERE EMAIL='$email'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        die("User not found.");
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
    <title>Edit Profile</title>
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

        /* Form Container */
        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.6s ease-in-out;
        }

        /* Heading */
        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Input Fields */
        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: 500;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #0072ff;
            outline: none;
            box-shadow: 0px 0px 8px rgba(0, 114, 255, 0.3);
        }

        /* Update Button */
        button {
            width: 100%;
            padding: 12px;
            background: #0072ff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
        }

        button:hover {
            background: #005bbf;
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
                font-size: 20px;
            }

            input {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Profile</h2>
        <form method="POST">
            <input type="hidden" name="email" value="<?= htmlspecialchars($user['EMAIL']) ?>">
            <label>Full Name:</label>
            <input type="text" name="fullname" value="<?= htmlspecialchars($user['FULLNAME']) ?>" required>
            <label>Password:</label>
            <input type="text" name="password" value="<?= htmlspecialchars($user['PASSWORD']) ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>