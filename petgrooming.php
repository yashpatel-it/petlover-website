<?php
include 'header.php';
include 'track.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Grooming</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .header-div {
            text-align: center;
            margin: 0;
            background-color: gray;
            padding: 20px 0;
            width: 100%;
        }

        .header-div h1 {
            font-size: 2.5rem;
            color: #333;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0 15px;
        }

        .image-div {
            margin: 20px 0;
            text-align: center;
            width: 100%;
        }

        .image-div img {
            width: 100%;
            max-width: 600px;
            /* Increased image size */
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-right: 200px;
        }

        .content {
            width: 90%;
            max-width: 800px;
            text-align: justify;
            margin: 20px auto;
        }

        .content p {
            margin-bottom: 15px;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .inquiry-btn {
            display: inline-block;
            background-color: #ED6436;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .inquiry-btn:hover {
            background-color: #Ed6436;
            text-decoration: none;
            color: white;
        }

        /* Add space below the button */
        .button-container {
            margin-bottom: 50px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-div h1 {
                font-size: 2rem;
            }

            .content {
                font-size: 1rem;
            }

            .inquiry-btn {
                font-size: 1rem;
                padding: 8px 16px;
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
    <!-- Header Section -->
    <div class="header-div">
        <h1>Top Groomers</h1>
    </div>

    <!-- Content Container -->
    <div class="container">
        <!-- Image Section -->
        <div class="image-div">
            <img src="./img/grommer.jpg" alt="Grooming Image">
        </div>

        <!-- Paragraph Section -->
        <div class="content">
            <h2>The Importance of Pet Grooming
            </h2>
            <p>Pet grooming is not just about keeping your furry friend looking good—it’s a vital part of their overall health and well-being. Regular grooming sessions help to remove dirt, debris, and loose fur, which can cause skin irritations or infections if left unchecked. Moreover, brushing your pet’s coat stimulates natural oils, promoting a shiny and healthy appearance. Proper grooming also includes checking for fleas, ticks, and other parasites, ensuring your pet remains free from these nuisances. Grooming isn’t just a luxury; it’s a necessity for maintaining hygiene and comfort for your beloved companion.</p>
            <h2>Health Benefits of Grooming
            </h2>
            <p>Grooming goes beyond aesthetics; it plays a significant role in identifying early health issues. For instance, routine nail trimming prevents discomfort and helps maintain proper posture in pets. Ear cleaning can avert infections caused by wax buildup or dirt, especially in breeds prone to ear problems. Groomers often spot lumps, rashes, or other abnormalities that may require a vet’s attention. Additionally, a clean and well-maintained coat reduces shedding and dander, benefiting not only the pet but also their owners, particularly those with allergies. Regular grooming keeps your pet active, comfortable, and happy.</p>
        </div>

        <!-- Button Section -->
        <div class="button-container">
            <a href="contact.php" class="inquiry-btn">Inquiry Now</a>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>