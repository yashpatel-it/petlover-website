<?php
require 'connect.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Password update logic (handling forgot password)
if (isset($_POST['reset_password'])) {
    $forgot_email = mysqli_real_escape_string($conn, $_POST['forgot_email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if ($new_password === $confirm_password) {
        // Store the plain password without hashing
        $sql = "UPDATE user SET password = '$new_password' WHERE email = '$forgot_email'";

        if ($conn->query($sql) === TRUE) {
            header("Location: login.php?msg=password_updated");
            exit();
            echo "<p>Password updated successfully.</p>";
        } else {
            echo "<p>Error updating password: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Passwords do not match.</p>";
    }
}

// Login logic (checking user credentials)
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to fetch the stored password for the given username
    $sql = "SELECT password FROM user WHERE email = '$username'"; // Assuming email is the username
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the stored password
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Check if the entered password matches the stored password
        if ($stored_password === $password) {
            echo "<p>Login successful.</p>";
            // You can redirect to the user dashboard or any other page
        } else {
            echo "<p>Invalid username or password.</p>";
        }
    } else {
        echo "<p>Invalid username or password.</p>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password & Login</title>
    <style>
        /* Modal styles */
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        /* Login Form Styles */
        form {
            background-color: #fff;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #004d99;
        }

        .error {
            color: red;
            font-size: 0.9em;
            display: none;
            margin-top: -5px;
        }

        /* Forgot Password Modal Styles */
        #forgotPasswordModal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
            display: none;
            width: 300px;
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        #forgotPasswordModal button {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        #forgotPasswordModal button:hover {
            background-color: #004d99;
        }

        /* Modal Overlay Styles */
        #modalOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        /* Form Input and Button States */
        input:focus,
        button:focus {
            outline: none;
            border-color: #0066cc;
        }

        /* Responsive Design for Mobile */
        @media (max-width: 480px) {
            form {
                width: 80%;
            }

            #forgotPasswordModal {
                width: 80%;
            }
        }
    </style>
</head>

<body>

    <!-- Trigger button for Forgot Password Modal -->
    <button onclick="showForgotPasswordModal()">Forgot Password?</button>

    <!-- Overlay -->
    <div id="modalOverlay" onclick="closeForgotPasswordModal()"></div>

    <!-- Forgot Password Modal -->
    <div id="forgotPasswordModal">
        <div class="modal-content">
            <h2>Forgot Password</h2>
            <form action="" method="post" onsubmit="return validateForgotPasswordForm()">
                <input type="email" placeholder="Enter Your Email" name="forgot_email" id="forgot_email" required>
                <input type="password" placeholder="Enter New Password" name="new_password" id="new_password" required>
                <input type="password" placeholder="Confirm New Password" name="confirm_password" id="confirm_password" required>
                <button type="submit" name="reset_password">Update Password</button>
            </form>
            <button onclick="closeForgotPasswordModal()">Close</button>
        </div>
    </div>

    <script>
        // Show the Forgot Password modal
        function showForgotPasswordModal() {
            const modal = document.getElementById("forgotPasswordModal");
            const overlay = document.getElementById("modalOverlay");

            if (modal && overlay) {
                modal.style.display = "block";
                overlay.style.display = "block";
            }
        }

        // Close the Forgot Password modal
        function closeForgotPasswordModal() {
            const modal = document.getElementById("forgotPasswordModal");
            const overlay = document.getElementById("modalOverlay");

            if (modal && overlay) {
                modal.style.display = "none";
                overlay.style.display = "none";
            }
        }

        // Validate forgot password form input
        function validateForgotPasswordForm() {
            const email = document.getElementById("forgot_email").value;
            const newPassword = document.getElementById("new_password").value;
            const confirmPassword = document.getElementById("confirm_password").value;

            if (!email.includes("@")) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (newPassword !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>