<?php

// Include database connection
require 'connect.php';
include 'track.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feed'])) {
    // Retrieve form data
    $named = $conn->real_escape_string(trim($_POST['FN']));
    $emaild = $conn->real_escape_string(trim($_POST['FM']));
    $ratingd = $conn->real_escape_string($_POST['FR']);
    $messaged = $conn->real_escape_string(trim($_POST['FMSG']));

    // Define the rating labels
    $ratingLabels = [
        "5" => "5 - Excellent",
        "4" => "4 - Good",
        "3" => "3 - Average",
        "2" => "2 - Poor",
        "1" => "1 - Very Poor"
    ];

    // Get the label corresponding to the selected rating
    $ratingLabel = isset($ratingLabels[$ratingd]) ? $ratingLabels[$ratingd] : "No rating";

    // Insert data into the database
    $sql = "INSERT INTO feedbacktbl (NAME, EMAIL, RATING, MESSAGE) VALUES ('$named', '$emaild', '$ratingLabel', '$messaged')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Petlover</title>
    <style>
        /* styles.css */

        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            background-image: url("https://thumbs.dreamstime.com/b/feedback-concept-image-arrows-blue-chalkboard-background-40378284.jpg");
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 1em;
            margin-bottom: 5px;
            color: #333;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        textarea {
            resize: vertical;
        }

        #submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #ED6436;
            color: white;
            font-size: 1.1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #submit-btn:hover {
            background-color: #ED6436;
        }

        /* Error Messages */
        .error-message {
            display: none;
            color: red;
            font-size: 0.9em;
        }

        /* Success Message */
        .success-message {
            background-color: #28a745;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            font-size: 1.1em;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            button {
                font-size: 1em;
            }
        }

        .back-to-top {
            position: fixed;
            display: block;
            right: 30px;
            bottom: 30px;
            z-index: 11;
            animation: action 1s infinite alternate;
        }

        @keyframes action {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="text">
            <center>
                <button onclick="window.history.back();"
                    style="border: none; background: none; cursor: pointer; font-size: 20px;">

                    <h2><i class="fa-solid fa-arrow-left" style="color: #FFD43B; font-size: 24px;   "> </i>Feedback Form</h2>
                </button>
            </center>
        </div>

        <p>Please provide your feedback for Petlover.</p>

        <form id="feedback-form" action="feedback.php" method="POST">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="FN" placeholder="Enter your name" required>
                <small class="error-message" id="name-error">Name is required</small>
            </div>

            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="FM" placeholder="Enter your email" required>
                <small class="error-message" id="email-error">Please enter a valid email</small>
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <select id="rating" name="FR" required>
                    <option value="">Select a rating</option>
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Good</option>
                    <option value="3">3 - Average</option>
                    <option value="2">2 - Poor</option>
                    <option value="1">1 - Very Poor</option>
                </select>
                <small class="error-message" id="rating-error">Please select a rating</small>
            </div>

            <div class="form-group">
                <label for="message">Your Feedback</label>
                <textarea id="message" name="FMSG" rows="4" placeholder="Write your feedback here" required></textarea>
                <small class="error-message" id="message-error">Message cannot be empty</small>
            </div>

            <input type="submit" id="submit-btn" name="feed" value="regester">
        </form>

        <div id="success-message" class="success-message" style="display: none;">
            <p>Your feedback has been sent successfully. Thank you!</p>
        </div>
    </div>

    <script>
        // script.js

        // Get the form and elements
        const form = document.getElementById('feedback-form');
        const submitButton = document.getElementById('submit-btn');
        const successMessage = document.getElementById('success-message');

        // Get input elements
        const nameField = document.getElementById('name');
        const emailField = document.getElementById('email');
        const ratingField = document.getElementById('rating');
        const messageField = document.getElementById('message');

        // Get error message elements
        const nameError = document.getElementById('name-error');
        const emailError = document.getElementById('email-error');
        const ratingError = document.getElementById('rating-error');
        const messageError = document.getElementById('message-error');

        // Function to validate the form
        function validateForm() {
            let isValid = true;

            // Reset error messages
            nameError.style.display = 'none';
            emailError.style.display = 'none';
            ratingError.style.display = 'none';
            messageError.style.display = 'none';

            // Validate Name
            if (!nameField.value.trim()) {
                nameError.style.display = 'block';
                isValid = false;
            }

            // Validate Email
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailField.value.trim() || !emailPattern.test(emailField.value)) {
                emailError.style.display = 'block';
                isValid = false;
            }

            // Validate Rating
            if (!ratingField.value) {
                ratingError.style.display = 'block';
                isValid = false;
            }

            // Validate Message
            if (!messageField.value.trim()) {
                messageError.style.display = 'block';
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>

</html>