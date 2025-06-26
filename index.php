<?php
include 'header.php';
?>
<?php include 'modal.php'; ?>
<?php include 'track.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <script>
        (function(w, d) {
            w.CollectId = "66a22a39f4318a97acfb3b94";
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.async = true;
            s.setAttribute("src", "https://collectcdn.com/launcher.js");
            h.appendChild(s);
        })(window, document);
    </script>

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <a target="_blank" href="https://api.whatsapp.com/send?phone=+916351265933&text=Hello%20YAKSH%20PATEL%20%20I%20Am%20Looking%20For%20"><img src="http://www.akashsir.com/my-images/about/whatsapp1.png" class='pulse' style="height: auto; width: 150px;background:none; position: fixed;border-radius: 35px; bottom: 0; margin: 0 0 10px 10px; z-index: 9999;" /></a>
    <style>
        /* Add a slide-in from left transition */
        .slide-in-left {
            opacity: 0;
            transform: translateX(-100%);
            /* Start position is off-screen */
            animation: slideInLeft 2s forwards;
        }

        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-100%);
                /* Off-screen left */
            }

            100% {
                opacity: 1;
                transform: translateX(0);
                /* Final position */
            }
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

        .massonary {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            overflow: hidden;
            color: white;

        }

        .massonary a {
            text-decoration: none;
            color: white;

        }

        .massonary button {
            background-color: #ED6436;
            /* Green */
            color: white;
            padding: 15px 32px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            position: relative;
            animation: moveRight 5s infinite linear;
            text-decoration: none;

        }

        .massonary button a:hover {
            color: white;
            text-decoration: none;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            /* Adjust size of images */
            gap: 20px;
            /* Space between items */
            background-color: black;
            /* Light black background */
            padding: 40px;
            border-radius: 10px;
            justify-items: center;
            /* Centers images in their grid cells */
        }

        .gallery-title h2 {
            text-align: center;
            /* Centers the title */
            color: white;
            font-size: 2rem;
            /* Adjust font size */
            margin-bottom: 20px;
            /* Adds space below the title */
            grid-column: span 2;
            /* Makes title span across multiple columns */
            width: 100%;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            background-color: #444;
            /* Slightly lighter shade of black for gallery items */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Optional: Add shadow for effect */
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures images cover the container area without stretching */
            border-radius: 10px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;

        }

        /* Hover effect to zoom the image */
        .gallery-item:hover img {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
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


        /* Container to Limit the Button's Movement */
        .button-container {
            position: relative;
            width: 80%;
            /* Adjust width as needed */
            height: 80px;
            /* Height of the area where the button moves */
            margin: auto;
            background-color: light white;
            border: none;
            overflow: hidden;
            /* Ensures button doesn't go outside */
            display: flex;
            align-items: center;
        }

        /* Moving Button */
        .emergency-btn {
            position: absolute;
            display: inline-block;
            background: #d9534f;
            color: white;
            padding: 15px 25px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 30px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            animation: moveButton 6s linear infinite alternate;
            transition: background 0.3s ease-in-out, transform 0.2s ease;
        }

        /* Animation to Move Button Left-Right */
        @keyframes moveButton {
            0% {
                left: 0;
            }

            100% {
                left: calc(100% - 380px);
                /* Adjust as per button width */
            }
        }

        /* Ensure text stays white & non-decorated */
        .emergency-btn:hover {
            background: #c9302c;
            /* Slightly darker red on hover */
            transform: scale(1.05);
            /* Slight zoom effect */
        }

        .emergency-btn:hover,
        .emergency-btn:hover a {
            text-decoration: none;
            color: white !important;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .button-container {
                width: 95%;
                /* Increase container width for small screens */
            }

            .emergency-btn {
                font-size: 16px;
                /* Reduce font size */
                padding: 12px 20px;
                /* Adjust padding */
            }

            @keyframes moveButton {
                0% {
                    left: 0;
                }

                100% {
                    left: calc(100% - 100px);
                    /* Adjust for smaller screens */
                }
            }
        }

        @media (max-width: 480px) {
            .button-container {
                width: 100%;
            }

            .emergency-btn {
                font-size: 14px;
                padding: 10px 18px;
            }

            @keyframes moveButton {
                0% {
                    left: 0;
                }

                100% {
                    left: calc(100% - 200px);
                    /* Shorter distance for very small screens */
                }
            }
        }

        .service-card {
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: transparent;
            border: none;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .service-icon {
            font-size: 3rem;
            color: #ED6436;
        }

        .btn-learn {
            text-transform: uppercase;
            font-weight: bold;
            color: #ED6436;
            transition: color 0.3s;
        }

        .btn-learn:hover {
            color: #ED6436;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- carosuel start  -->
    <div class="container-fluid p-0 ">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block slide-in-left">Best Pet Services</h3>
                            <h1 class="display-3 text-white mb-3 slide-in-left">Keep Your Pet Happy</h1>
                            <h5 class="text-white mb-3 d-none d-sm-block"></h5>
                            <a href="price.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4 slide-in-left">Packages</a>
                            <a href="loginuser\login.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4 slide-in-left">login</a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center ">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block slide-in-left">Best Pet Services</h3>
                            <h1 class="display-3 text-white mb-3 slide-in-left">Pet Spa & Grooming</h1>
                            <h5 class="text-white mb-3 d-none d-sm-block"></h5>
                            <a href="price.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4 slide-in-left">Packages</a>
                            <a href="loginuser\login.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4 slide-in-left">login</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <br>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3">About Us</h4>
                <h1 class="display-4 mb-4"><span class="text-primary">Boarding</span> & <span class="text-secondary">Daycare</span></h1>
                <h5 class="text-muted mb-3"></h5>
                <p class="mb-4">We provide exceptional boarding and daycare services, ensuring your pets receive personalized care, socialization, and a safe environment. Your furry friends are treated like family with us!</p>
                <ul class="list-inline">
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>Best In Industry</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>Emergency Services</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-check-double text-secondary mr-3"></i>24/7 Customer Support</h5>
                    </li>
                </ul>
                <a href="about.php" class="btn btn-lg btn-primary mt-3 px-4">Learn More</a>
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100" src="img/about-1.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="img/about-2.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="img/about-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
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
    <!-- Services End -->


    <!-- Features Start -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid w-100" src="img/feature.jpg" alt="" style="border-radius: 10px;">
            </div>
            <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3">Why Choose Us?</h4>
                <h1 class="display-4 mb-4"><span class="text-primary">Special Care</span> On Pets</h1>
                <p class="mb-4"></p>
                <div class="row py-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="flaticon-cat font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0">Best In Industry</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="flaticon-doctor font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0">Emergency Services</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <h1 class="flaticon-care font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0">Special Care</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0">Customer Support</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <!-- Features End -->

    <!-- gallery start  -->
    <div class="gallery-container">
        <div class="gallery-title">
            <h2>Our Gallery</h2>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-17.jpg" alt="Dog 1">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-18.jpg" alt="Dog 2">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-22.jpg" alt="Dog 1">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-21.jpg" alt="Dog 2">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-20.jpg" alt="Dog 1">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-19.jpg" alt="Dog 2">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-15.jpg" alt="Dog 1">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-12.jpg" alt="Dog 2">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="gallery-item">
            <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-13.jpg" alt="Dog 1">
            <div class="eye-icon" onclick="openZoomModal(this)">👁️</div>
        </div>
        <div class="massonary">
            <button><a href="passanary.php">Take More ➡️</a></button>
        </div>


        <!-- Add more images up to 50 -->
    </div>
    <!-- gallery end  -->
    <div class="button-container">
        <a href="tel:919825184005" class="emergency-btn">🚑 Call Emergency: +91 9825184005</a>
    </div>
    <!-- Pricing Plan Start -->
    <center>
        <h2 style="color: #ED6436; padding-top: 15px;">------ select best packages -----</h2>
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
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">2000</span>
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
                        <span class="sc_price_currency">From ₹</span><span class="sc_price_money">3000</span>
                    </div>
                </div>
                <div class="sc_price_block_link">
                    <a href="contact.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_hover_slide_top">Enquire Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Plan End -->




    <!-- Footer End -->


    <?php
    include 'footer.php';
    ?>

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