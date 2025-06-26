<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Lover Footer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <style>
        .btn:hover {
            background-color: transparent;
            border: 2px solid #ED6436;
            color: #ED6436;
            transition: all 0.3s ease-in-out;
        }

        .donation-box {
            text-align: center;
            background: #222;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .donation-box h2 {
            color: #ED6436;
        }

        .donation-box p {
            color: #fff;
        }

        .qr-code {
            width: 120px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white">
                    <span class="text-primary">Pet</span>Lover
                </h1>
                <p class="m-0">
                    Welcome to Pet Paradise, your ultimate destination for all things pets! From expert advice on pet care
                    and nutrition to heartwarming stories and fun activities, we cover everything to keep your furry,
                    feathered, and scaly friends happy and healthy.
                </p>
                <!-- Donation Box -->
                <div class="donation-box text-left" style="text-align: left; padding: 20px; max-width: 400px;">
                    <h2>Support Our Pets 🐾</h2>
                    <p>Click the button below to donate and help our furry friends!</p>
                    <a href="donation.php" class="btn btn-lg" style="background-color: #ED6436; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: bold; display: inline-block;">
                        🐾 Donate Now
                    </a>
                </div>


            </div>



            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5" style="margin-left: 60px;">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i> 62, Satadhar Soc, A.K. Road, Surat, India</p>
                        <p><i class="fa fa-phone-alt mr-2"></i> +91 6351265933</p>
                        <p><i class="fa fa-envelope mr-2"></i> petlover25438@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-md-4 mb-5" style="margin-left: 150px;">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i> Home</a>
                            <a class="text-white mb-2" href="about.php"><i class="fa fa-angle-right mr-2"></i> About Us</a>
                            <a class="text-white mb-2" href="service.php"><i class="fa fa-angle-right mr-2"></i> Our Services</a>
                            <a class="text-white mb-2" href="price.php"><i class="fa fa-angle-right mr-2"></i> Our Price</a>
                            <a class="text-white" href="contact.php"><i class="fa fa-angle-right mr-2"></i> Contact Us</a>
                        </div>
                    </div>

                    <div class="col-md-4 mb-5 d-flex justify-content-end">
                        <a href="bark.php" class="btn btn-lg btn-primary px-3 mx-2">Bark</a>
                        <a href="feedback.php" class="btn btn-lg btn-primary px-3 mx-2">Feedback</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    <a class="text-white font-weight-bold" href="index.php">Pet Lover</a>. All Rights Reserved. Designed by Pet Lover.
                </p>
            </div>
        </div>
    </div>
</body>

</html>