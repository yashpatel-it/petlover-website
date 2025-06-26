<?php

include 'track.php';
// Ensure no output before this line

// Database Connection
$conn = new mysqli("localhost", "root", "", "petlover");

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Form Submission
if (isset($_POST['submit'])) {
    $name = $_POST['NAME'];
    $email = $_POST['EMAIL'];
    $amount = $_POST['AMT'];
    $paymentMode = $_POST['P_MODE'];

    $cardName = isset($_POST['C_NAME']) ? $_POST['C_NAME'] : null;
    $cardNumber = isset($_POST['C_NUM']) ? $_POST['C_NUM'] : null;
    $expiry = isset($_POST['EX_DATE']) ? $_POST['EX_DATE'] : null;
    $cvv = isset($_POST['CVV']) ? $_POST['CVV'] : null;

    // Insert Data into Database
    $stmt = $conn->prepare("INSERT INTO donations (name, email, amount, payment_mode, card_name, card_number, expiry, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsssss", $name, $email, $amount, $paymentMode, $cardName, $cardNumber, $expiry, $cvv);

    if ($stmt->execute()) {
        // Redirect to thankyou.php with name and amount
        header("Location: thankyou.php?name=" . urlencode($name) . "&amount=" . urlencode($amount));
        exit(); // Stop further execution
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .donation-card {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .thank-you,
        .payment-details,
        .offline-details,
        .limit-message {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="donation-card">
            <h2 class="text-center">Support Our Pets 🐶🐱</h2>
            <form id="donationForm" method="post" action="donation.php">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name="NAME" placeholder="Enter Your Name" required pattern="^[A-Za-z ]+$">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="EMAIL" placeholder="Enter Your Email" required>
                </div>
                <div class="mb-3">
                    <label>Amount (₹)</label>
                    <input type="number" class="form-control" id="amount" name="AMT" placeholder="Enter Amount" required min="1">
                    <p class="text-danger limit-message mt-1">For donations above ₹10,000, please visit our center or call us.</p>
                </div>
                <div class="mb-3">
                    <label>Payment Mode</label>
                    <select class="form-control" id="paymentMode" name="P_MODE" required>
                        <option value="">Select Mode</option>
                        <option value="Online">Online (Debit Card)</option>
                        <option value="Offline">Offline (Visit Location)</option>
                    </select>
                </div>

                <!-- Debit Card Details (Online Payment) -->
                <div class="payment-details" id="onlineDetails">
                    <div class="mb-3">
                        <label>Cardholder Name</label>
                        <input type="text" class="form-control" id="cardName" pattern="^[A-Za-z ]+$" name="C_NAME" placeholder="Enter Card Holder Name" required>
                    </div>
                    <div class="mb-3">
                        <label>Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" pattern="\d{16}" name="C_NUM" placeholder="Enter Card Number" required>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="me-2">
                            <label>Expiry Date</label>
                            <input type="text" class="form-control" id="expiry" placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/\d{2}" name="EX_DATE" placeholder="Enter Expiry Date" required>
                        </div>
                        <div>
                            <label>CVV</label>
                            <input type="text" class="form-control" id="cvv" pattern="\d{3}" name="CVV" placeholder="Enter CVV Number" required>
                        </div>
                    </div>
                </div>

                <!-- Offline Payment Details -->
                <div class="offline-details" id="offlineDetails">
                    <p><strong>Visit Us:</strong> Pet Care Center, 123 Main Street, Ahmedabad.</p>
                    <p>Come and donate in person. We appreciate your support!</p>
                </div>

                <button type="submit" class="btn btn-primary w-100" id="donateButton" name="submit">Donate Now</button>
            </form>
        </div>

        <div class="thank-you mt-3" id="thankYou">
            <h3>Thank You, <span id="userName"></span>! ❤️</h3>
            <p>Your donation of ₹<span id="donatedAmount"></span> has been received.</p>
            <button class="btn btn-success" onclick="window.print()">Print Receipt</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var donationLimit = 10000;

            $("#paymentMode").change(function() {
                var mode = $(this).val();
                $(".payment-details, .offline-details").hide();
                if (mode === "Online") {
                    $("#onlineDetails").show();
                } else if (mode === "Offline") {
                    $("#offlineDetails").show();
                }
            });

            $("#amount").on("input", function() {
                var amount = parseInt($(this).val());
                if (amount > donationLimit) {
                    $(".limit-message").show();
                    $("#donateButton").prop("disabled", true);
                } else {
                    $(".limit-message").hide();
                    $("#donateButton").prop("disabled", false);
                }
            });

            $("#donationForm").submit(function(e) {
                var name = $("#name").val();
                var amount = $("#amount").val();

                if (name && amount) {
                    return true; // Allow form submission
                } else {
                    e.preventDefault(); // Prevent only if fields are empty
                    alert("Please fill all fields correctly.");
                }
            });

            $(document).ready(function() {
                if (window.location.href.indexOf("success=true") !== -1) {
                    $("#userName").text(localStorage.getItem("donorName"));
                    $("#donatedAmount").text(localStorage.getItem("donatedAmount"));
                    $(".thank-you").show();
                }
            });


        });
    </script>

</body>

</html>