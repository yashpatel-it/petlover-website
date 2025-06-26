<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .thank-you {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-top: 50px;
        }

        .thank-you h3 {
            color: #28a745;
        }

        .thank-you p {
            font-size: 18px;
            color: #333;
        }

        .highlight {
            color: #ff5733;
            font-weight: bold;
        }

        .explore {
            margin-top: 20px;
        }

        .explore a {
            display: block;
            padding: 10px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: #007bff;
            border-radius: 5px;
            margin-top: 10px;
            transition: 0.3s;
        }

        .explore a:hover {
            background: #0056b3;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            margin: 0 10px;
            text-decoration: none;
            font-size: 24px;
            color: #333;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="thank-you">
        <h3>Thank You, <span class="highlight"><?php echo htmlspecialchars($_GET['name']); ?></span>! ❤️</h3>
        <p>Your generous donation of <span class="highlight">₹<?php echo htmlspecialchars($_GET['amount']); ?></span> is making a difference in the lives of pets.</p>

        <p>We are truly grateful for your support. Your kindness helps us provide **better care, food, and shelter** to animals in need.</p>

        <button class="btn btn-success" onclick="window.print()">Print Receipt</button>
        <br><br>
        <a href="index.php" class="btn btn-primary">Go to Home</a>

        <div class="explore">
            <h4>Want to do more?</h4>
            <p>Explore our website and see how you can help!</p>
            <a href="service.php">Our Services</a>
            <a href="index.php">Become a Volunteer</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="social-icons">
            <h4>Stay Connected</h4>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </div>

    <!-- FontAwesome for Social Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>