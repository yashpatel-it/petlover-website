<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover-about</title>
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

        .list-inline button {
            background-color: #ED6436;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            transition: transform 0.3s ease, background-color 0.3s ease;
            /* Add transition for transform and background-color */
        }

        .list-inline button a {
            color: #fff;
            text-decoration: none;
        }

        /* Hover effect */
        .list-inline button:hover {
            transform: scale(1.05);
            /* Slightly increases the size */
            background-color: #ED6436;
            color: #fff;
            border: 2px solid #ED6436;
        }

        .vc_row wpb_row vc_row-fluid vc_custom_1467974253040 vc_row-has-fill {
            position: relative;
            left: -83px;
            box-sizing: border-box;
            width: 904px;
            max-width: 904px;
            padding-left: 83px;
            padding-right: 83px;
        }

        .vc_row[data-vc-full-width] {
            transition: opacity .5s ease;
            overflow: hidden;
        }

        .vc_custom_1467974253040 {
            background-color: #333;
            width: auto;
            background-size: contain;
        }

        .wpb_row,
        .wpb_text_column,
        .wpb_content_element,
        ul.wpb_thumbnails-fluid>li,
        .last_toggle_el_margin,
        .wpb_button {
            margin-bottom: 0 !important;
        }

        .footer-section {
            background-color: #ED6436;
            /* Dark background similar to footer */
            padding: 40px 0;
            color: #fff;

        }

        .footer-items {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            text-align: center;
            margin: 10px;
        }

        .footer-item {
            background-color: wheat;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            transition: background-color 0.3s ease;
        }

        .footer-item a {
            color: white;
            text-decoration: none;
        }

        .footer-item:hover {
            background-color: wheat;
            /* On hover, change the background color */
            text-decoration: none;
        }

        .footer-item a:hover {
            text-decoration: none;
        }

        .footer-item span {
            font-size: 40px;
            margin-bottom: 15px;
            display: block;
            color: #fff;
        }

        .footer-item h4 {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .footer-item p {
            font-size: 14px;
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .footer-items {
                flex-direction: column;
                align-items: center;
            }

            .footer-item {
                width: 80%;
                /* Adjust width for smaller screens */
                margin-bottom: 20px;
            }
        }

        .services-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px 20px;
        }

        .services-layout {
            display: grid;
            grid-template-areas:
                "card1 main card2"
                "card3 main card4";
            grid-template-columns: 1fr auto 1fr;
            grid-gap: 20px;
            align-items: center;
            justify-items: center;
        }

        .main-image {
            grid-area: main;
            text-align: center;
            animation: none;
            /* Removed rotation */
        }

        .main-image img {
            width: 250px;
            height: auto;
            border-radius: 50%;
        }

        .service-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 250px;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .service-card img {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
        }

        .service-card h3 {
            font-size: 1.5rem;
            color: #Ed6436;
            margin-bottom: 10px;
        }

        .service-card p {
            font-size: 1rem;
            color: #555;
            margin: 0;
        }

        @media (max-width: 768px) {
            .services-layout {
                grid-template-areas:
                    "card1"
                    "main"
                    "card2"
                    "card3"
                    "card4";
                grid-template-columns: 1fr;
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
    <?php
    include 'header.php';
    include 'track.php';
    ?>


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


            <div class="row py-5">
                <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                    <h3 class="text-secondary mb-3">Our story</h3>
                    <h5 class="text-muted mb-3"></h5>
                    <p class="mb-4">Our Story
                        We have been grooming for many years now and we love every part of our job! We provide a very warm and friendly environment for your pets. Our professional team made sure your pet always gets the highest level of care, because we treat all pets as if they were our own!</p><br><br>
                    <ul class="list-inline">
                        <li>
                            <button><a href="/PetLover/contact.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small alignleft fl margin_top_null sc_button_hover_slide_top">Request a Call</a></button><span class="text" style="margin-left: 100px; font-size:32px">or Call Us:</span><span class="text-primary" style="font-size: 15px;">+91 635-126-5933</span>
                        </li>
                    </ul>

                </div>

                <div class="col-lg-5">
                    <div class="row px-3">
                        <div class="col-12 p-0">
                            <img class="img-fluid w-100" src="img/about new1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>



            <!-- About End -->


            <!-- Features Start -->
            <div class="container-fluid bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <img class="img-fluid w-100" src="img/feature.jpg" alt="">
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
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <div class="container-fluid">
        <div class="vc_row wpb_row vc_row-fluid vc_custom_1467974253040 vc_row-has-fill footer-section">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="vc_empty_space"><span class="vc_empty_space_inner"></span></div>
                        <div id="sc_services_159130611_wrap" class="sc_services_wrap scheme_dark">
                            <div id="sc_services_159130611" class="sc_services sc_services_style_services-2 sc_services_type_icons  margin_top_large margin_bottom_large">
                                <div class="sc_columns columns_wrap footer-items">
                                    <div class="footer-item">
                                        <a href="petgrooming.php">
                                            <span class="fa fa-scissors"></span>
                                            <h4>Top Groomers</h4>
                                            <p>Our professional team provide exceptional grooming service.</p>
                                        </a>
                                    </div>
                                    <div class="footer-item">
                                        <a href="petservice.php">
                                            <span class="fa fa-crown"></span>
                                            <h4>V.I.P. Service</h4>
                                            <p>We take pride in giving you and your pet personalized attention.</p>
                                        </a>
                                    </div>
                                    <div class="footer-item">
                                        <a href="lovepet.php">
                                            <span class="fa fa-heart"></span>
                                            <h4>We Love Every Pet</h4>
                                            <p>We love every pet, so your pet feel relaxed and stress free.</p>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /.sc_services -->
                        </div><!-- /.sc_services_wrap -->
                        <div class="vc_empty_space"><span class="vc_empty_space_inner"></span></div>
                    </div>
                </div>
            </div>
        </div><br><br>
    </div><br><br>

    <div class="services-container">
        <h2 class="sc_title sc_title_underline sc_align_center margin_top_huge margin_bottom_huge" style="text-align:center;">Our Services</h2>
        <div class="services-layout">
            <div class="service-card" style="grid-area: card1;">
                <img src="https://tse4.mm.bing.net/th?id=OIP.r4ykh3KQMYSYl4Ibq16pzwHaHa&pid=Api&P=0&h=180" alt="Full Grooming">
                <h3>Full Grooming</h3>
                <p>Your pet is in good hands with us! Let your favorite get the best care in our center.</p>
            </div>

            <div class="service-card" style="grid-area: card2;">
                <img src="https://tse4.mm.bing.net/th?id=OIP.dltEcfIEsqudIGAvUC4uywHaHa&pid=Api&P=0&h=180" alt="Styling">
                <h3>Styling</h3>
                <p>Our team of pet hair stylists is happy to make your animal look pretty and happy.</p>
            </div>

            <div class="main-image">
                <img src="https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-31.jpg" alt="Main Pet Image">
            </div>

            <div class="service-card" style="grid-area: card3;">
                <img src="https://tse1.mm.bing.net/th?id=OIP.w5RiifT8Zimn4ImAVaQeAQHaHa&pid=Api&P=0&h=180" alt="Bath & Dry">
                <h3>Bath & Dry</h3>
                <p>We use a big range of shampoos for all different coat types and breeds.</p>
            </div>

            <div class="service-card" style="grid-area: card4;">
                <img src="https://tse3.mm.bing.net/th?id=OIP.2FSJpk5wBrSXbm1PRRNVVQHaHa&pid=Api&P=0&h=180" alt="Medical Bath">
                <h3>Medical Bath</h3>
                <p>Bathing in our vet bath, using an appropriate shampoo that is kind to pet’s skin.</p>
            </div>
        </div>
    </div>



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