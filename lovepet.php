<?php
include 'header.php';
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
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header-div">
        <h1>Love the pet</h1>
    </div>

    <!-- Content Container -->
    <div class="container">
        <!-- Image Section -->
        <div class="image-div">
            <img src="./img/lovepet.jpg" alt="Grooming Image">
        </div>

        <!-- Paragraph Section -->
        <div class="content">
            <h2>Loving Your Pet: A Bond Like No Other
            </h2>
            <p>Loving a pet goes far beyond providing food and shelter—it’s about creating a connection that fills both your lives with joy and purpose. Pets thrive on affection, whether it’s a gentle pat, a playful romp in the park, or a cozy snuggle after a long day. This unconditional love builds trust and loyalty, turning everyday moments into cherished memories. When you truly love your pet, you give them the emotional security they need to feel safe and happy, creating a lifelong bond that’s as rewarding for you as it is for them.</p>

            <p>Caring for your pet with love also means understanding their unique needs and ensuring they feel valued and appreciated. From their favorite treats to the perfect toys, it’s the little things that make them wag their tails or purr with delight. Taking the time to nurture them, whether through grooming, training, or simple acts of kindness, strengthens the special connection you share. Pets are not just companions—they’re family, and loving them wholeheartedly enriches their lives as much as yours.</p>
            <p>Through love, pets teach us patience, compassion, and the joy of living in the moment. Their devotion reminds us to celebrate the simple pleasures of life and embrace each day with a heart full of gratitude. Loving your pet is a journey of endless giving and receiving, where every wag, purr, or nuzzle is a reminder of the profound bond you share. It’s a love that transcends words, leaving pawprints not just on your home but on your soul.</p>
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