<?php
$userInitial = ''; // Default empty

if (isset($_COOKIE['email'])) {
    $userEmail = $_COOKIE['email']; // Get user email from cookie
    $userInitial = strtoupper($userEmail[0]); // Get the first letter and convert to uppercase
}
?>



<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
    <link rel="stylesheet" href="css/style.min.css">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=+916351265933&text=Hello%20YAKSH%20PATEL%20%20I%20Am%20Looking%20For%20"><img src="http://www.akashsir.com/my-images/about/whatsapp1.png" class='pulse' style="height: auto; width: 150px;background:none; position: fixed;border-radius: 35px; bottom: 0; margin: 0 0 10px 10px; z-index: 9999;" /></a>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 100;
        }


        .btn:hover {
            background-color: transparent;
            border: 1px solid #ED6436;
            color: #ED6436;
            transition: all 0.3s ease-in-out;
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
            z-index: 9999;
        }

        /* Ensure dropdown stays open when hovering */
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }


        .dropdown-item {
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
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

        .m-0 a:hover {
            text-decoration: none;
        }

        .navbar {
            padding: 15px 10px !important;
        }

        .navbar-nav .nav-link {
            font-size: 14px !important;
            padding: 6px 10px !important;
        }

        .navbar-brand h1 {
            font-size: 24px !important;
        }

        .btn {
            font-size: 14px !important;
            padding: 6px 12px !important;
            font-weight: bold;

        }

        .navbar-toggler {
            margin-left: auto;
            border: 1px solid white;
        }


        .navbar-nav .nav-link {
            font-size: 20px !important;
            /* Increase font size */
            font-weight: bold !important;
            border-radius: 10px;
        }

        #loginBtn,
        #logoutBtn {
            margin-left: 10px;
        }


        .floating-feedback:hover {
            background: #ED6436;
        }


        #logoutBtn {
            display: none;
            /* Hide by default */
        }

        @media (max-width: 991px) {

            /* For Small Screens */
            #logoutBtn {
                display: block;
                /* Show inside navbar toggler */
            }
        }

        @media (min-width: 992px) {

            /* For Large Screens */
            #logoutBtnDesktop {
                display: block;
                /* Show on large screens */
            }
        }

        .user-icon-container {
            position: absolute;
            right: 1px;
            top: 10%;
            transform: translateY(-50%);
        }


        .user-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #ED6436;
            /* Profile circle color */
            color: white;
            font-weight: bold;
            font-size: 18px;
            border-radius: 50%;
            text-decoration: none;
            cursor: pointer;
            right: 20px;
        }

        .user-icon a:hover {
            text-decoration: none;
            color: #fff;
        }

        .user-icon:hover {
            background-color: #ff7f50;
            /* Hover effect */
        }

        @media (max-width: 576px) {

            /* Adjusts for extra small screens */
            .user-icon-container {
                position: absolute;
                right: 15px;
                /* Ensures proper spacing */
                top: 15px;
                /* Keeps it visible */
                z-index: 1000;
                /* Keeps it above other elements */
            }
        }

        @media (max-width: 768px) {
            .border-right {
                border-right: none;
                border-bottom: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>


    <!-- Topbar Start -->

    <div class="row py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="./index.php" class="navbar-brand d-none d-lg-block">
                <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <div class="d-flex flex-wrap align-items-center justify-content-center">
                <div class="d-flex flex-column text-center p-2 border-right">
                    <h6>Opening Hours</h6>
                    <p class="m-0" style="color: #ED6436;">8.00AM - 9.00PM</p>
                </div>
                <div class="d-flex flex-column text-center p-2 border-right">
                    <h6>Email Us</h6>
                    <p class="m-0"><a href="mailto:petlover25438@gmail.com">petlover25438@gmail.com</a></p>
                </div>
                <div class="d-flex flex-column text-center p-2">
                    <h6>Call Us</h6>
                    <p class="m-0"><a href="tel:+916351265933">+91 9825184005</a></p>
                </div>
            </div>



            <!-- <a href="logout.php" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i>logout</a> -->
            <div class="user-icon-container">
                <?php if (isset($_COOKIE['email'])): ?>
                    <a href="user_profile.php" class="user-icon"><?php echo $userInitial; ?></a>
                <?php else: ?>
                    <a href="loginuser/login.php" class="btn btn-primary"><i class="fa-solid fa-user"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0 ">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <!-- Navbar Brand (Logo) -->
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white">
                    <span class="text-primary">Pet</span>Lover
                </h1>
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>



            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>">Home</a>
                    <a href="about.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'active'; ?>">About</a>

                    <!-- Dropdown Menu for Services -->
                    <div class="nav-item dropdown">
                        <a href="service.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'service.php') echo 'active'; ?>" data-toggle="dropdown">Services</a>
                        <div class="dropdown-menu">
                            <a href="service.php" class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'service.php') echo 'active'; ?>">Pet Services</a>
                            <a href="petadopt.php" class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'service.php') echo 'active'; ?>">Adopt Pet</a>
                            <a href="insurance.php" class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'service.php') echo 'active'; ?>">Pet Insurance</a>
                            <a href="petdonate.php" class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'service.php') echo 'active'; ?>">Donat Pet</a>
                            <a href="vet_service.php" class="dropdown-item <?php if (basename($_SERVER['PHP_SELF']) == 'service.php') echo 'active'; ?>">vet consulation</a>

                        </div>
                    </div>

                    <a href="price.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'price.php') echo 'active'; ?>">Packages</a>
                    <a href="booking.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'booking.php') echo 'active'; ?>">Booking</a>
                    <a href="contact.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'active'; ?>">Contact</a>
                    <a href="volunteer.php" class="nav-item nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'volunteer.php') echo 'active'; ?>">Volunteer</a>

                    <?php if (isset($_COOKIE['email'])): ?>
                        <a href="./logout.php" class="nav-item nav-link btn btn-danger" id="logoutBtn">Logout</a>
                    <?php else: ?>
                        <!-- <a href="loginuser/login.php" class="nav-item nav-link btn btn-primary" id="loginBtn">Login</a> -->
                    <?php endif; ?>
                </div>

                <!-- Book Now & Login Buttons (Only visible in Desktop) -->
                <a href="booking.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block <?php if (basename($_SERVER['PHP_SELF']) == 'booking.php') echo 'active'; ?>">Book Now</a>
                <?php if (isset($_COOKIE['email'])): ?>
                    <a href="./logout.php" class="btn btn-lg btn-danger px-3 d-none d-lg-block" id="logoutBtn">Logout</a>
                <?php else: ?>
                    <a href="loginuser/login.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block" id="loginBtn">Login</a>
                <?php endif; ?>


            </div>
        </nav>

    </div>
    <!-- Navbar End -->

    <script>
        window.onload = function() {
            if (document.cookie.includes("email")) {
                document.getElementById("loginBtn").style.display = "none";
                document.getElementById("logoutBtn").style.display = "block";
            } else {
                document.getElementById("loginBtn").style.display = "block";
                document.getElementById("logoutBtn").style.display = "none";
            }
        };
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener('scroll', function() {
                var feedbackBtn = document.getElementById('feedbackBtn');
                if (feedbackBtn) {
                    if (window.scrollY > 100) {
                        feedbackBtn.style.visibility = 'visible';
                        feedbackBtn.style.opacity = '1';
                    } else {
                        feedbackBtn.style.visibility = 'hidden';
                        feedbackBtn.style.opacity = '0';
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener("copy", function(event) {
            event.preventDefault();
            alert("Nice try! But this content is protected. 🚫 Copying is not allowed!");
        });
    </script>
    <script>
        document.addEventListener("copy", function(event) {
            event.preventDefault(); // Prevent copying
            alert("Oops! Copying is not allowed. Create your own content! 😜");
        });

        document.addEventListener("paste", function(event) {
            event.preventDefault(); // Prevent pasting
            alert("Oops! Pasting copied content is disabled! 🚫");
        });
    </script>


</body>

</html>