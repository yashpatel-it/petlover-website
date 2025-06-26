<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover-Packages</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=+916351265933&text=Hello%20YAKSH%20PATEL%20%20I%20Am%20Looking%20For%20"><img src="http://www.akashsir.com/my-images/about/whatsapp1.png" class='pulse' style="height: auto; width: 150px;background:none; position: fixed;border-radius: 35px; bottom: 0; margin: 0 0 10px 10px; z-index: 9999;" /></a>
    <style>
        /* Custom CSS for smooth transition */
        .carousel-caption {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        }

        .carousel-item.active .carousel-caption {
            opacity: 1;
            transform: translateX(0);
        }

        /* Optional: Button hover effect */
        .btn {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Button hover effect */
        .btn:hover {
            background-color: transparent;
            border: 2px solid #ED6436;
            /* Keeps the button outline */
            color: #ED6436;
            /* Text color changes to match the border */
            transition: all 0.3s ease-in-out;
        }

        /* Hide the first Login button by default on large screens */
        .nav-item.nav-link[href="loginuser\\login.php"] {
            display: none;
        }

        /* Show the first Login button in mobile view */
        @media (max-width: 991px) {
            .nav-item.nav-link[href="loginuser\\login.php"] {
                display: block;
                padding: 10px 15px;
                border-radius: 5px;
                background-color: #ED6436;
                color: white;
                text-align: center;
                border: none;
                transition: all 0.3s ease-in-out;
            }

            /* Hover effect */
            .nav-item.nav-link[href="loginuser\\login.php"]:hover {
                background-color: transparent;
                border: 2px solid #ED6436;
                color: #ED6436;
            }
        }

        /* Container for the three cards */
        .cards-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            /* Adds space between cards */
            flex-wrap: wrap;
            padding: 0 15px;
            margin: unset;
        }

        /* Style for each card */
        .card {
            flex: 1 1 calc(33.333% - 30px);
            /* This allows each card to take up one-third of the width minus the gap */
            min-width: 280px;
            /* Ensures cards don't shrink too small on mobile */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            padding: 20px;
            text-align: center;
            height: 450px;
            position: relative;
            /* To position the elements inside the card */
        }

        /* Hover effect: Increase the height vertically */
        .card:hover {
            transform: translateY(0);
            height: 460px;
            /* Increase height on hover (expand downwards) */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Image styling */
        .sc_price_photo img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .card:hover .sc_price_photo img {
            transform: scale(1.1);
        }

        /* Title Styling */
        .sc_price_block_title {
            font-size: 20px;
            font-weight: 600;
            margin: 15px 0;
            color: #333;
        }

        /* Description Styling */
        .sc_price_block_description {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }

        .sc_price_block_description ul li {
            list-style-type: disc;
            float: left;
        }


        /* Price Styling */
        .sc_price {
            font-size: 18px;
            font-weight: 600;
        }

        .sc_price_currency {
            color: #Ed6436;
        }

        /* Enquire Now Button Styling */
        .sc_price_block_link .sc_button {
            background-color: #ED6436;
            color: #fff;
            border-radius: 50px;
            padding: 10px 30px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: inline-block;
            text-decoration: none;
        }

        .sc_price_block_link .sc_button:hover {
            background-color: #Ed6436;
            transform: translateY(-5px);
        }

        /* Responsiveness for mobile view */
        @media (max-width: 768px) {
            .cards-wrapper {
                flex-direction: column;
                align-items: center;
            }

            .card {
                flex: 1 1 100%;
                margin-bottom: 30px;
            }
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .pricing-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .cardn {
            background: white;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .cardn h3 {
            color: #ff5733;
        }

        .cardn p {
            margin: 10px 0;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #27ae60;
        }

        .btnn {
            background: #ED6436;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
        }

        .btnn:hover {
            background: #ED6436;
            text-decoration: none;
            color: white;

        }


        .offer-banner {
            background: #ED6436;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            color: white;
        }

        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .comparison-table th,
        .comparison-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;

        }

        .comparison-table th {
            background: #ED6436;
            color: white;
        }

        .testimonials {
            margin-top: 30px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
        }

        .testimonials h3 {
            text-align: center;
        }

        .review {
            margin-bottom: 15px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
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


        .container-fluid {
            width: 100%;
            padding: 40px 10%;
        }

        h1 {
            color: #ed6436;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .packages-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .package-card {
            background: #ed6436;
            color: white;
            width: 350px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
            text-align: left;
        }

        .package-card:hover {
            transform: scale(1.07);
        }

        .package-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .package-price {
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .package-details {
            font-size: 15px;
            line-height: 1.6;
            text-align: justify;
        }

        .subscription-options {
            text-align: center;
            margin-top: 15px;
        }

        .book-btn {
            display: block;
            width: 100%;
            margin-top: 15px;
            padding: 10px 0;
            background: white;
            color: #ed6436;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .book-btn:hover {
            background: #fff0e6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .packages-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <?php
    include 'header.php';
    include 'track.php';
    ?>


    <div class="container-fluid">
        <center>
            <h1 style="color: #ED6436; padding-top: 15px;">------- Explore the Best Pet Care Package ------</h1>
        </center><br><br>
        <div class="packages-container">

            <!-- Base Package -->
            <div class="package-card">
                <div class="package-title">Base Package</div>
                <div class="package-price">₹499 / Month</div>
                <div class="package-details">
                    Our **Base Package** is perfect for pet owners who need **essential care** for their furry friends. This package includes:
                    <ul>
                        <li>✔ **Daily Feeding:** Nutritionally balanced meals served twice a day.</li>
                        <li>✔ **Morning & Evening Walks:** 15-minute walks for fresh air and exercise.</li>
                        <li>✔ **Playtime:** Engaging play sessions to keep your pet happy.</li>
                        <li>✔ **Hydration Check:** Ensuring fresh water is available all day.</li>
                        <li>✔ **Basic Health Monitoring:** Regular checkups to ensure your pet’s well-being.</li>
                    </ul>
                </div>
                <div class="subscription-options">
                    <strong>Available Plans:</strong><br>
                    🐾 Weekly - ₹199 | 🐾 Monthly - ₹499 | 🐾 Yearly - ₹4999
                </div>
                <a href="booking.php" class="book-btn">Book Now</a>
            </div>

            <!-- Standard Package -->
            <div class="package-card">
                <div class="package-title">Standard Package</div>
                <div class="package-price">₹999 / Month</div>
                <div class="package-details">
                    The **Standard Package** offers **comprehensive care** for your pet, ensuring their health and happiness. This package includes:
                    <ul>
                        <li>✔ **Premium Pet Food:** High-quality meals tailored to your pet’s diet.</li>
                        <li>✔ **30-Minute Daily Exercise:** Outdoor activities to keep them fit.</li>
                        <li>✔ **Basic Grooming (Once a Week):** Bathing, brushing, and nail trimming.</li>
                        <li>✔ **Veterinary Checkups:** Monthly visits to monitor health conditions.</li>
                        <li>✔ **Emergency Support:** 24/7 assistance for any pet concerns.</li>
                    </ul>
                </div>
                <div class="subscription-options">
                    <strong>Available Plans:</strong><br>
                    🐾 Weekly - ₹399 | 🐾 Monthly - ₹999 | 🐾 Yearly - ₹9999
                </div>
                <a href="booking.php" class="book-btn">Book Now</a>
            </div>

            <!-- Premium Package -->
            <div class="package-card">
                <div class="package-title">Premium Package</div>
                <div class="package-price">₹1999 / Month</div>
                <div class="package-details">
                    Our **Premium Package** provides the **best-in-class pet care services**, ensuring your pet’s **ultimate comfort and health**:
                    <ul>
                        <li>✔ **Personalized Diet & Nutrition Plan:** Custom meals for optimal health.</li>
                        <li>✔ **1-Hour Daily Exercise & Play:** Strengthening fitness and agility.</li>
                        <li>✔ **Weekly Grooming & Spa Sessions:** Relaxing massages and skin care.</li>
                        <li>✔ **24/7 Veterinary Assistance:** Immediate support for medical needs.</li>
                        <li>✔ **Luxury Pet Boarding:** Comfortable overnight stays with special care.</li>
                        <li>✔ **Behavioral Training:** Sessions with expert trainers for obedience.</li>
                        <li>✔ **Exclusive Pet Events:** Fun social gatherings with other pets.</li>
                    </ul>
                </div>
                <div class="subscription-options">
                    <strong>Available Plans:</strong><br>
                    🐾 Weekly - ₹799 | 🐾 Monthly - ₹1999 | 🐾 Yearly - ₹19999
                </div>
                <a href="booking.php" class="book-btn">Book Now</a>
            </div>

        </div>
    </div>


    <!-- Pricing Plan Start -->
    <center>
        <h2 style="color: #ED6436; padding-top: 15px;">------ our petcare packages -----</h2>
        <p>Choose the best package for your pet's needs!</p>

    </center>
    <div class="cards-wrapper">
        <div class="card">
            <div class="sc_price_block">
                <div class="sc_price_photo">
                    <img loading="lazy" decoding="async" class="wp-post-image" width="156" height="156" alt="image-22.jpg"
                        src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-22-156x156.jpg">
                </div>
                <div class="sc_price_block_title">
                    <span>Deluxe Bath & Groom</span>
                </div>
                <div class="sc_price_block_description">
                    Grooming service for a small dog includes bathing, ear cleaning, and grooming.
                </div>
                <div class="sc_price_block_money">
                    <div class="sc_price">
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">1500</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="booking.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Book Now</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="sc_price_block">
                <div class="sc_price_photo">
                    <img loading="lazy" decoding="async" class="wp-post-image" width="156" height="156" alt="price2.jpg"
                        src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/price2-156x156.jpg">
                </div>
                <div class="sc_price_block_title">
                    <span>Bath & Full Groom</span>
                </div>
                <div class="sc_price_block_description">
                    Our full groom package includes: bath, dry with styling, and nail clipping.
                </div>
                <div class="sc_price_block_money">
                    <div class="sc_price">
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">2000</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="booking.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Book Now</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="sc_price_block">
                <div class="sc_price_photo">
                    <img loading="lazy" decoding="async" class="wp-post-image" width="156" height="156" alt="price3.jpg"
                        src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/price3-156x156.jpg">
                </div>
                <div class="sc_price_block_title">
                    <span>Bath & Tidy Up</span>
                </div>
                <div class="sc_price_block_description">
                    Our service for a large dog includes nail trim, cleaning, haircut, and blow dry.
                </div>
                <div class="sc_price_block_money">
                    <div class="sc_price">
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">3000</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="booking.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Book Now</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="sc_price_block">
                <div class="sc_price_photo">
                    <img loading="lazy" decoding="async" class="wp-post-image" width="156" height="156" alt="image-22.jpg"
                        src="https://tse4.mm.bing.net/th?id=OIP.9JBLRWALba7ekvp5ldLeUwHaE8&pid=Api&P=0&h=180">
                </div>
                <div class="sc_price_block_title">
                    <span>Pupply Care Package</span>
                </div>
                <div class="sc_price_block_description">
                    <p>For young puppies who need extra care.

                    </p>
                    <ul>
                        <li>Bathing with premium shampoo</li><br>
                        <li>Ear cleaning & Nail trimming</li><br>
                        <li>Brushing & coat conditioning</li><br>
                        <li>Sanitary trimming</li><br>
                    </ul>
                </div>
                <div class="sc_price_block_money">
                    <div class="sc_price">
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">3500</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="booking.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Book Now</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="sc_price_block">
                <div class="sc_price_photo">
                    <img loading="lazy" decoding="async" class="wp-post-image" width="156" height="156" alt="price2.jpg"
                        src="https://tse4.mm.bing.net/th?id=OIP.qENlYDOA13eSQU5Eo4kTMwHaFI&pid=Api&P=0&h=180">
                </div>
                <div class="sc_price_block_title">
                    <span>Seniour Pet care</span>
                </div>
                <div class="sc_price_block_description">
                    <p>For older pets needing gentle grooming.

                    </p>
                    <ul>
                        <li>soft massage bath</li><br>
                        <li>Nail & Paw care</li><br>
                        <li>Dental cleaning</li><br>
                        <li>Fur trimming</li><br>
                    </ul>
                </div>
                <div class="sc_price_block_money">
                    <div class="sc_price">
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">5000</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="booking.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Book Now</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="sc_price_block">
                <div class="sc_price_photo">
                    <img loading="lazy" decoding="async" class="wp-post-image" width="156" height="156" alt="price3.jpg"
                        src="https://tse2.mm.bing.net/th?id=OIP.mqRhOckmwdBXPr5Kj5bfnAHaFS&pid=Api&P=0&h=180">
                </div>
                <div class="sc_price_block_title">
                    <span>Luxury Spa Treatment</span>
                </div>
                <div class="sc_price_block_description">
                    <p>For pets who deserve VIP treatment.</p>
                    <ul>
                        <li>Aromatherapy bath</li><br>
                        <li>Deep conditioning</li><br>
                        <li>Paw & nose balm application</li><br>
                        <li>Relaxing pet massage</li><br>
                    </ul>
                </div>
                <div class="sc_price_block_money">
                    <div class="sc_price">
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">7000</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="booking.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Book Now</a>
                </div>
            </div>
        </div>

    </div>

    <div class="container">

        <h2 style="text-align:center; margin-top: 30px;">Compare Packages</h2>
        <table class="comparison-table">
            <tr>
                <th>Service</th>
                <th>Basic</th>
                <th>Standard</th>
                <th>Premium</th>
            </tr>
            <tr>
                <td>Bath & Nail Trimming</td>
                <td>✅</td>
                <td>✅</td>
                <td>✅</td>
            </tr>
            <tr>
                <td>Full Body Grooming</td>
                <td>❌</td>
                <td>✅</td>
                <td>✅</td>
            </tr>
            <tr>
                <td>Spa & Massage</td>
                <td>❌</td>
                <td>❌</td>
                <td>✅</td>
            </tr>
        </table>

        <div class="testimonials">
            <h3 style="color: #ED6436; padding-top: 15px;">What Our Customers Say</h3>
            <div class="review">● "Great service! My pet loved the grooming." - Rahul S.</div>
            <div class="review">● "Very professional and friendly staff." - Meera P.</div>
            <div class="review">● "Highly recommended for pet lovers!" - Arjun T.</div>
        </div>
    </div>

    <!-- Pricing Plan End -->


    <!-- Footer Start -->
    <?php
    include 'footer.php';
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>