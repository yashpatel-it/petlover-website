<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover-services</title>
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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <link rel="stylesheet" href="css/style.min.css"> -->


    <!-- Customized Bootstrap Stylesheet -->
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

        /* Dropdown Style */
        .nav-item.dropdown {
            position: relative;
        }

        .nav-item.dropdown .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 10;
            right: 0;
            background-color: #333;
            border: none;
            z-index: 1050;
        }

        .dropdown-item {
            color: #ED6436;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu {
            background-color: #333;
        }

        .dropdown-menu a:hover {
            text-decoration: none;
            color: white;
        }

        .dropdown-item:hover {
            background-color: #ED6436;
            color: white;
            border-radius: 20px;
        }


        /* Make the 'Services' nav item clickable */
        .nav-item.dropdown>a {
            cursor: pointer;
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



        /* Container for the three cards */
        .cards-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            /* Adds space between cards */
            flex-wrap: wrap;
            /* Makes the layout responsive */
            margin-top: 50px;
            padding: 0 15px;
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
            height: 400px;
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

        .service-card {
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .service-icon {
            font-size: 3rem;
            color: #ED6436;
        }

        .btn-learn {
            text-transform: uppercase;
            font-weight: bold;
            color: #Ed6436;
            transition: color 0.3s;
        }

        .btn-learn:hover {
            color: #ED6436;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- Services Start -->
    <!-- <div class="container-fluid bg-light pt-5">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Our Services</h4>
                <h1 class="display-4 m-0"><span class="text-primary">Premium</span> Pet Services</h1>
            </div>
            <div class="row pb-3">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-house display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Pet Boarding</h3>
                        <p>Pet boarding is a service where pets for by professionals while their owners are away.</p>
                        <a class="text-uppercase font-weight-bold" href="service.php"></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-food display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Pet Feeding</h3>
                        <p>Pet feeding refers to the process of nutritional are met for growth, health, and overall well-being.</p>
                        <a class="text-uppercase font-weight-bold" href="service.php"></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Pet Grooming</h3>
                        <p>Pet grooming is the practice of cleaning and maintaining a pet's hygiene and appearance.</p>
                        <a class="text-uppercase font-weight-bold" href="service.php"></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-cat display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Per Training</h3>
                        <p>Pet training is teaching animals to perform specific behaviors or through commands and rewards.</p>
                        <a class="text-uppercase font-weight-bold" href="service.php"></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-dog display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Pet Exercise</h3>
                        <p>Pet exercise is physical activity designed to keep pets healthy and fit.</p>
                        <a class="text-uppercase font-weight-bold" href="service.php"></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-vaccine display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Pet Treatment</h3>
                        <p>Pet treatment refers to medical care and procedures provided to restore their health.</p>
                        <a class="text-uppercase font-weight-bold" href="service.php"></a>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br> -->

    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h4 class="text-secondary">Our Services</h4>
                <h1 class="display-4"><span class="text-primary">Premium</span> Pet Services</h1>
            </div>
            <div class="row">
                <!-- Pet Boarding -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="service-card bg-white text-center p-4">
                        <div class="service-icon mb-3">🏠</div>
                        <h3>Pet Boarding</h3>
                        <p>Safe and comfortable pet boarding services while you're away, ensuring your pet gets proper care.</p>
                        <a class="btn-learn" href="servicedes.php">Learn More →</a>
                    </div>
                </div>
                <!-- Pet Feeding -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="service-card bg-white text-center p-4">
                        <div class="service-icon mb-3">🍖</div>
                        <h3>Pet Feeding</h3>
                        <p>Nutritious meal plans tailored to your pet’s needs for a healthy and happy life.</p>
                        <a class="btn-learn" href="servicedes.php">Learn More →</a>
                    </div>
                </div>
                <!-- Pet Grooming -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="service-card bg-white text-center p-4">
                        <div class="service-icon mb-3">✂️</div>
                        <h3>Pet Grooming</h3>
                        <p>Professional grooming to keep your pet clean, healthy, and looking great.</p>
                        <a class="btn-learn" href="servicedes.php">Learn More →</a>
                    </div>
                </div>
                <!-- Pet Training -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="service-card bg-white text-center p-4">
                        <div class="service-icon mb-3">🐶</div>
                        <h3>Pet Training</h3>
                        <p>Behavioral and obedience training to ensure a well-mannered and happy pet.</p>
                        <a class="btn-learn" href="servicedes.php">Learn More →</a>
                    </div>
                </div>
                <!-- Pet Exercise -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="service-card bg-white text-center p-4">
                        <div class="service-icon mb-3">🏃</div>
                        <h3>Pet Exercise</h3>
                        <p>Regular exercise helps maintain a healthy weight and improves overall well-being.</p>
                        <a class="btn-learn" href="servicedes.php">Learn More →</a>
                    </div>
                </div>
                <!-- Pet Treatment -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="service-card bg-white text-center p-4">
                        <div class="service-icon mb-3">💉</div>
                        <h3>Pet Treatment</h3>
                        <p>Medical care and treatments to ensure your pet stays in the best health.</p>
                        <a class="btn-learn" href="servicedes.php">Learn More →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services End -->
    <center>
        <h2 style="color: #ED6436;">------ our packages -----</h2>
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
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">4500</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="contact.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Enquire Now</a>
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
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">5500</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="contact.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Enquire Now</a>
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
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">6500</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="contact.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Enquire Now</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Testimonial Start -->
    <!-- Testimonial End -->





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