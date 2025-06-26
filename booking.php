<?php
// Get message from URL
$message = isset($_GET['message']) ? urldecode($_GET['message']) : "";
$message_type = isset($_GET['type']) ? $_GET['type'] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover-booking</title>
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
    <link href="css/style.css" rel="stylesheet">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=+916351265933&text=Hello%20YAKSH%20PATEL%20%20I%20Am%20Looking%20For%20"><img src="http://www.akashsir.com/my-images/about/whatsapp1.png" class='pulse' style="height: auto; width: 150px;background:none; position: fixed;border-radius: 35px; bottom: 0; margin: 0 0 10px 10px; z-index: 9999;" /></a>
    <style>
        .message {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
        }

        .success {
            color: green;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .error {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        /* Add a slide-in from left transition */
        .slide-in-left {
            opacity: 0;
            transform: translateY(-100%);
            /* Start position is off-screen */
            animation: slideInLeft 2s forwards;
        }

        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateY(-100%);
                /* Off-screen left */
            }

            100% {
                opacity: 1;
                transform: translateY(0);
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

        #popupMessage {
            display: none;
            text-align: center;
            background: #ffcccc;
            /* Light red background */
            color: #a94442;
            /* Darker red text */
            padding: 15px 20px;
            font-weight: bold;
            border-radius: 15px;
            /* Rounded corners */
            margin-bottom: 20px;
            /* Space below message */
            font-size: 18px;
            /* Larger text */
            border: 2px solid #a94442;
            /* Dark border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
        }

        #popupMessage p {
            margin: 0;
            /* Remove default paragraph margin */
        }

        .feedback-box {
            display: none;
            position: relative;
            bottom: 20px;
            width: 300px;
            padding: 15px;
            background: lightgreen;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.8s ease-in-out;
        }

        .feedback-box.left {
            left: -350px;
            transform: translateX(0);
        }

        .feedback-box.right {
            right: -350px;
            transform: translateX(0);
        }

        .feedback-box.show.left {
            transform: translateX(380px);
        }

        .feedback-box.show.right {
            transform: translateX(-380px);
        }

        .feedback-buttons {
            margin-top: 10px;
        }

        .feedback-buttons button {
            padding: 5px 10px;
            margin: 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .ok-btn {
            background: blue;
            color: white;
        }

        .later-btn {
            background: red;
            color: white;
        }

        .download-card {
            display: none;
            /* Initially hidden */
            margin-top: 20px;
            padding: 20px;
            border: 2px solid #333;
            background-color: #f9f9f9;
            width: 300px;
        }

        .btn-download {
            display: none;
            /* Initially hidden */
            margin-top: 20px;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-download:hover {
            background-color: #218838;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body onload="showMessage()">
    <?php if (!empty($message)) : ?>
        <div id="messageBox" class="message <?php echo htmlspecialchars($message_type); ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>
    <?php
    include 'header.php';
    include 'track.php';

    ?>


    <!-- Booking Start -->
    <div class="container-fluid slide-in-left">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <p style="color: #fff; font-size: 18px; font-weight: 500; line-height: 1.5;">"(Book For Normal Sevices Only...)"</p>
                        <div id="popupMessage"></div>

                        <form id="bookingForm" class="py-5" action="insert.php" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control border-0 p-4" placeholder="Your Name" required="required">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control border-0 p-4" placeholder="Your Email" required="required">
                            </div>
                            <div class="form-group">
                                <div class="phone" id="phone">
                                    <input type="text" name="phoneno" class="form-control border-0 p-4 datetimepicker-input" placeholder="Your Mobile number" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="date" id="date" require>
                                    <input type="date" name="reservation_date" class="form-control border-0 p-4 datetimepicker-input" placeholder="Reservation Date" data-target="#date" data-toggle="datetimepicker" min="<?= date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="reservation_time" class="custom-select border-0 px-4" style="height: 47px;" required>
                                    <option value="" selected>Select A Time</option>
                                    <option value="09:00 AM">09:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="12:00 PM">12:00 PM</option>
                                    <option value="01:00 PM">01:00 PM</option>
                                    <option value="02:00 PM">02:00 PM</option>
                                    <option value="03:00 PM">03:00 PM</option>
                                    <option value="04:00 PM">04:00 PM</option>
                                    <option value="05:00 PM">05:00 PM</option>
                                    <option value="06:00 PM">06:00 PM</option>
                                    <option value="07:00 PM">07:00 PM</option>
                                    <option value="08:00 PM">08:00 PM</option>
                                    <option value="09:00 PM">09:00 PM</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="service" class="custom-select border-0 px-4" style="height: 47px;" required>
                                    <option value="" selected>Select A Package</option>
                                    <option value="Basic">Basic</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                    <option value="Premium">Delux Bath & Groom</option>
                                    <option value="Premium">Bath & Full Groom</option>
                                    <option value="Premium">Bath &Tidy Tip</option>
                                    <option value="Premium">Puppy care Package</option>
                                    <option value="Premium">Seniour pet care Package</option>
                                    <option value="Premium">Luxuary Spa Package</option>


                                </select>
                            </div>
                            <div class="form-group">
                                <select name="duration" class="custom-select border-0 px-4" style="height: 47px;" required>
                                    <option value="" selected>Service duration</option>
                                    <option value="on-two day">One or Two Days</option>
                                    <option value="weekly">weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="butt btn-dark btn-block border-0 py-3">Book Now</button>
                                <button type="submit" class="butt btn-dark btn-block border-0 py-3" onclick="location.reload();">Cancel </button>

                            </div>

                        </form>
                        <!-- Success message and download card -->
                        <!-- Success Message and Download Button -->
                        <div id="success-message" class="hidden success-message">
                            <p>Service Booked Successfully!</p>
                        </div>

                        <button id="downloadBtn" class="btn-download">Download PDF</button>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const bookingForm = document.getElementById("bookingForm");
                                const successMessage = document.getElementById("success-message");
                                const downloadBtn = document.getElementById("downloadBtn");

                                // Check if form data exists in localStorage
                                const formData = JSON.parse(localStorage.getItem('formData'));

                                if (formData) {
                                    // Pre-fill form with stored data
                                    document.querySelector('[name="name"]').value = formData.name;
                                    document.querySelector('[name="email"]').value = formData.email;
                                    document.querySelector('[name="phoneno"]').value = formData.phoneno;
                                    document.querySelector('[name="reservation_date"]').value = formData.reservation_date;
                                    document.querySelector('[name="reservation_time"]').value = formData.reservation_time;
                                    document.querySelector('[name="service"]').value = formData.service;
                                    document.querySelector('[name="duration"]').value = formData.duration;

                                    successMessage.style.display = "block"; // Show success message
                                    downloadBtn.style.display = "inline-block"; // Show download button
                                }

                                // Handle form submission
                                bookingForm.addEventListener("submit", function(event) {
                                    event.preventDefault(); // Prevent the form from submitting immediately

                                    // Get form values
                                    const formData = {
                                        name: document.querySelector('[name="name"]').value,
                                        email: document.querySelector('[name="email"]').value,
                                        phoneno: document.querySelector('[name="phoneno"]').value,
                                        reservation_date: document.querySelector('[name="reservation_date"]').value,
                                        reservation_time: document.querySelector('[name="reservation_time"]').value,
                                        service: document.querySelector('[name="service"]').value,
                                        duration: document.querySelector('[name="duration"]').value
                                    };

                                    // Store form data in localStorage
                                    localStorage.setItem('formData', JSON.stringify(formData));

                                    // Show success message after form submission
                                    successMessage.style.display = "block";
                                    downloadBtn.style.display = "inline-block"; // Show download button
                                });

                                // Handle Download PDF Button
                                downloadBtn.addEventListener("click", function() {
                                    const {
                                        jsPDF
                                    } = window.jspdf;
                                    const doc = new jsPDF();

                                    // Retrieve form data from localStorage
                                    const formData = JSON.parse(localStorage.getItem('formData'));

                                    if (formData) {
                                        // Set the background color for the entire PDF
                                        doc.setFillColor(240, 240, 240); // Light grey background
                                        doc.rect(0, 0, doc.internal.pageSize.width, doc.internal.pageSize.height, 'F');

                                        // Add Website Name (Centered Header)
                                        doc.setFontSize(22);
                                        doc.setTextColor(0, 51, 102); // Dark blue color for website name
                                        doc.text("Thanks For Choosing us(PetLover)", doc.internal.pageSize.width / 2, 20, {
                                            align: "center"
                                        });

                                        // Add Purpose Section
                                        doc.setFontSize(14);
                                        doc.setTextColor(0, 51, 102); // Dark blue for headings
                                        doc.text("Purpose of this PDF:", 20, 40);
                                        doc.setFontSize(12);
                                        doc.setTextColor(0, 0, 0); // Black color for text
                                        doc.text("This document serves as a confirmation of your service booking.", 20, 50);
                                        doc.text("It contains all your booking details and can be used for future reference.", 20, 60);

                                        // Add Booking Details
                                        doc.setFontSize(14);
                                        doc.setTextColor(0, 51, 102); // Dark blue for headings
                                        doc.text("Booking Details:", 20, 80);
                                        doc.setFontSize(12);
                                        doc.setTextColor(0, 0, 0); // Black color for text
                                        doc.text(`User: ${formData.name}`, 20, 90);
                                        doc.text(`Email: ${formData.email}`, 20, 100);
                                        doc.text(`Phone: ${formData.phoneno}`, 20, 110);
                                        doc.text(`Date: ${formData.reservation_date}`, 20, 120);
                                        doc.text(`Time: ${formData.reservation_time}`, 20, 130);
                                        doc.text(`Service: ${formData.service}`, 20, 140);
                                        doc.text(`Duration: ${formData.duration}`, 20, 150);

                                        // Add a Suggestion Section
                                        doc.setFontSize(14);
                                        doc.setTextColor(0, 51, 102); // Dark blue for headings
                                        doc.text("Suggestion:", 20, 160);
                                        doc.setFontSize(12);
                                        doc.setTextColor(0, 0, 0); // Black color for text
                                        doc.text("We suggest you visit our website again for more services.", 20, 170);
                                        doc.text("Thank you for choosing our service!", 20, 180);

                                        // Add Footer - Your Website URL
                                        doc.setFontSize(10);
                                        doc.setTextColor(0, 51, 102); // Dark blue for footer
                                        doc.text("www.petlover.com", doc.internal.pageSize.width / 2, 290, {
                                            align: "center"
                                        });

                                        // Trigger the download of the PDF
                                        doc.save('service-booking-details.pdf');

                                        // After downloading the PDF, clear the form and reset localStorage
                                        bookingForm.reset(); // Reset the form fields
                                        localStorage.removeItem('formData'); // Clear the stored form data
                                        successMessage.style.display = "none"; // Hide success message
                                        downloadBtn.style.display = "none"; // Hide download button
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
                <hr>
                <hr>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5 slide-in-left">
                    <h4 class="text-secondary mb-3">Going for a vacation?</h4>
                    <h1 class="display-4 mb-4">Book For <span class="text-primary">Your Pet</span></h1>
                    <p></p>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Boarding</h5>
                                </div>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Feeding</h5>
                                </div>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-grooming font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Grooming</h5>
                                </div>
                                <p class="m-0"></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-toy font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Training</h5>
                                </div>
                                <p class="m-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <hr>

    <!-- Feedback Message -->
    <div id="feedbackMessage" class="feedback-box" style="display: none;">
        🎉 Thank you for your booking! We appreciate your trust. 💖
        <div class="feedback-buttons">
            <button class="ok-btn">OK</button>
            <button class="later-btn">Later</button>
        </div>
    </div>

    <!-- Booking end -->


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


    <script>
        function showMessage() {
            let messageBox = document.getElementById("messageBox");
            if (messageBox) {
                messageBox.style.display = "block"; // Show message

                setTimeout(() => {
                    messageBox.style.display = "none"; // Hide after 2 seconds
                    window.history.replaceState(null, null, window.location.pathname); // Remove URL parameters
                }, 3000);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            showMessage();
        });

        document.getElementById("bookingForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Stop form submission for validation

            // Get form values
            let name = document.getElementsByName("name")[0].value.trim();
            let email = document.getElementsByName("email")[0].value.trim();
            let phone = document.getElementsByName("phoneno")[0].value.trim();
            let reservation_date = document.getElementsByName("reservation_date")[0].value;
            let reservation_time = document.getElementsByName("reservation_time")[0].value;
            let service = document.getElementsByName("service")[0].value;
            let popupMessage = document.getElementById("popupMessage");

            // Clear any previous messages
            popupMessage.innerHTML = "";

            // Name Validation: Only letters and spaces
            let nameRegex = /^[A-Za-z\s]+$/;
            if (!nameRegex.test(name)) {
                showPopupMessage("❌ Please enter a valid name (letters and spaces only).");
                return;
            }

            // Email Validation
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showPopupMessage("❌ Please enter a valid email address.");
                return;
            }

            // Mobile Number Validation: Exactly 10 digits
            let phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(phone)) {
                showPopupMessage("❌ Please enter a valid 10-digit mobile number (digits only).");
                return;
            }

            // Date Validation
            if (reservation_date === "") {
                showPopupMessage("❌ Please select a reservation date.");
                return;
            }

            // Time Validation
            if (reservation_time === "") {
                showPopupMessage("❌ Please select a reservation time.");
                return;
            }

            // Service Validation
            if (service === "") {
                showPopupMessage("❌ Please select a service.");
                return;
            }

            // If all validations pass, submit the form
            this.submit();
        });
        // Function to show message
        function showPopupMessage(message) {
            let popupMessage = document.getElementById("popupMessage");
            popupMessage.innerHTML = `<p>${message}</p>`;
            popupMessage.style.display = "block"; // Show the message
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bookingForm = document.getElementById("bookingForm");
            const feedbackMessage = document.getElementById("feedbackMessage");
            const okBtn = document.querySelector(".ok-btn");
            const laterBtn = document.querySelector(".later-btn");

            // Check if the form was submitted before the page refreshed
            if (localStorage.getItem("formSubmitted") === "true") {
                setTimeout(function() {
                    feedbackMessage.style.display = "block"; // Show message after 5s
                    localStorage.removeItem("formSubmitted"); // Remove flag after showing message
                }, 5000);
            }

            // Handle form submission
            bookingForm.addEventListener("submit", function() {
                localStorage.setItem("formSubmitted", "true"); // Set flag before reload
            });

            // Redirect to feedback page on "OK"
            okBtn.addEventListener("click", function() {
                window.location.href = "feedback.php"; // Redirect to feedback page
            });

            // Hide message and show again after 4 seconds on "Later"
            laterBtn.addEventListener("click", function() {
                feedbackMessage.style.display = "none"; // Hide message
                setTimeout(function() {
                    feedbackMessage.style.display = "block"; // Show again after 4 seconds
                }, 4000);
            });
        });
    </script>




    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>