<?php
session_start();
require 'connect.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin_login WHERE admin_name = '$username' AND admin_password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            session_start(); // Start the session
            $_SESSION['adminId'] = $username;
            header("Location: http://localhost/petlover/admin_panel/index.php");
            exit(); // Ensure no further code is executed
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    } else {
        echo "<script>alert('Query failed: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url("https://wallpaperaccess.com/full/16725.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-container {
            background: rgba(72, 61, 139, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 300px;
            text-align: center;
            color: #fff;
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .login-container input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            margin: 5px 0;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            background-color: #ff7f50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #ff6347;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #888;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1><i class="fas fa-user-lock"></i> Admin Login</h1>
        <form action="admin_login.php" method="post">
            <div class="input-icon">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="name" required>
            </div>
            <div class="input-icon">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>