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
        <h1>V.I.P Service</h1>
    </div>

    <!-- Content Container -->
    <div class="container">
        <!-- Image Section -->
        <div class="image-div">
            <img src="./img/servicepet.jpg" alt="Grooming Image">
        </div>

        <!-- Paragraph Section -->
        <div class="content">
            <h2>Elevating Grooming to an Art
            </h2>
            <p>VIP pet grooming services go beyond the basics, offering an unparalleled level of care and attention tailored to your pet’s specific needs. These exclusive services include deep-cleaning baths with premium shampoos, gentle exfoliation to remove dirt and debris, and luxurious conditioning treatments that leave coats silky smooth. A personalized grooming plan ensures every detail, from fur texture to sensitive areas, is addressed with expertise and precision. For pets accustomed to the finer things, VIP grooming elevates hygiene and aesthetics into a true pampering experience.</p>
            <h2>Health and Wellness Redefined

            </h2>
            <p>VIP grooming is not just about looking good; it’s a comprehensive approach to health and wellness. Specialized nail care includes trimming and filing for a perfect finish, reducing the risk of discomfort or injury. Ear cleaning uses hypoallergenic solutions to prevent infections, while skin and coat treatments are customized to address issues like dryness or allergies. Groomers trained in advanced techniques also perform thorough checks for hidden health concerns, offering an added layer of protection for your beloved pet. This attention to detail ensures your pet’s health and happiness, all wrapped in a luxurious experience.</p>
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