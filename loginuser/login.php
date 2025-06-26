<?php
// Include database connection
require 'connect.php';

// Handle form submission for adding new data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Sanitize and validate input data
    $fullname = mysqli_real_escape_string($conn, $_POST['Namee']);
    $email = mysqli_real_escape_string($conn, $_POST['Emaill']);
    $password = mysqli_real_escape_string($conn, $_POST['Passwordd']);

    // Insert data into the database
    $sql1 = "INSERT INTO user (FULLNAME, EMAIL, PASSWORD) VALUES ('$fullname', '$email', '$password')";

    if (mysqli_query($conn, $sql1)) {
        // Redirect to the login page
        header("Location: login.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}

// Handle form submission for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submm'])) {
    // Sanitize and validate input data
    $email = mysqli_real_escape_string($conn, $_POST['em']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    // Check if the user exists in the database
    $sql2 = "SELECT * FROM user WHERE EMAIL = '$email'";
    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($password == $user_data['PASSWORD']) {
            setcookie("email", $email, time() + (86400 * 30), "/"); // Save email in a cookie (30 days)
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/PetLover/index.php");
            exit();
        } else {
            echo "<p class='login-error'>❌ Invalid email or password.</p>";
        }
    } else {
        echo "<p class='login-error'>❌ Invalid email or password.</p>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../loginuser/style1.css">
    <title>Modern Login Page </title>
    <style>
        body {
            background: linear-gradient(to right, #66ccff, rgb(204, 85, 0));

        }

        .text {
            text-align: center;
            margin-bottom: 20px;
            /* Adds space below the header */
        }

        h2 {
            font-size: 2.5em;
            color: white;
            margin-bottom: 40px;
            /* Adjust this to control how far above the form the header is */
        }

        .login-success {
            color: green;
            font-size: 1.2em;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-error {
            color: red;
            font-size: 1.2em;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container .forgotpsw {
            color: #66ccff;
        }

        .forgotpsw:hover {
            color: #66ccff;
        }

        .password-suggestion {
            display: none;
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="text">
        <center>
            <button onclick="window.history.back();"
                style="border: none; background: none; cursor: pointer; font-size: 20px;">

                <h2><i class="fa-solid fa-arrow-left" style="color: #FFD43B; font-size: 45px; "> </i> Login To Petlover</h2>
            </button>
        </center>
    </div>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="login.php" method="post">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" placeholder="Name" name="Namee" required>
                <input type="email" placeholder="Email" name="Emaill" required>
                <input type="password" placeholder="Password" name="Passwordd" id="password" required>
                <div id="password-suggestion" class="password-suggestion"></div>

                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
        <!-- SIGN IN PART  -->
        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="login.php" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="login.php" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="login.php" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="login.php" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email and password</span>
                <input type="email" placeholder="Email" name="em" required>
                <input type="password" placeholder="Password" name="pass" required>
                <a href="forgotpassword.php" class="forgotpsw">Forgot Your Password?</a>
                <a href="#">⬇️Already have an account⬇️</a>

                <button type="submit" name="submm">Sign In</button>

                <button type="button" onclick="window.location.href='../admin_login.php'"
                    style="margin-top: 10px; background: #FF5733; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; font-size: 16px;">
                    Admin Login
                </button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of the site's features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of the site's features</p>
                    <button class="hidden" id="register">Sign up</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });

        document.addEventListener("DOMContentLoaded", function() {
            let passwordField = document.getElementById("password");
            let passwordSuggestion = document.getElementById("password-suggestion");
            let signupForm = document.querySelector(".sign-up form"); // Selects the signup form

            passwordField.addEventListener("input", function() {
                let password = passwordField.value;
                let strength = getPasswordStrength(password);

                if (strength === "Weak") {
                    passwordSuggestion.innerHTML = "❌ Weak password. Use at least 8 characters, including a number & symbol.";
                    passwordSuggestion.style.color = "red";
                    passwordSuggestion.style.display = "block";
                    passwordField.style.border = "2px solid red"; // Highlight red
                } else {
                    passwordSuggestion.innerHTML = "✅ Strong password!";
                    passwordSuggestion.style.color = "green";
                    passwordSuggestion.style.display = "block";
                    passwordField.style.border = "2px solid green"; // Highlight green
                }
            });

            signupForm.addEventListener("submit", function(event) {
                let password = passwordField.value;

                if (getPasswordStrength(password) === "Weak") {
                    event.preventDefault(); // ❌ Stops form submission
                    alert("❌ Weak password detected! Please use at least 8 characters, including a number & special character.");
                    passwordField.style.border = "2px solid red"; // Keep field highlighted in red
                    passwordSuggestion.style.display = "block"; // Keep suggestion visible
                    passwordSuggestion.style.color = "red"; // Keep text red
                }
            });
        });

        // Function to check password strength
        function getPasswordStrength(password) {
            if (password.length < 8) return "Weak";
            if (!/[A-Z]/.test(password) || !/\d/.test(password) || !/[@$!%*?&#]/.test(password)) return "Weak";
            return "Strong";
        }
    </script>
</body>

</html>