<?php
include 'connect.php';
$sql = "SELECT NAME, MESSAGE, RATING FROM feedbacktbl";
$result = $conn->query($sql);
$feedbacks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover-contact</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=+916351265933&text=Hello%20YAKSH%20PATEL%20%20I%20Am%20Looking%20For%20"><img src="http://www.akashsir.com/my-images/about/whatsapp1.png" class='pulse' style="height: auto; width: 150px;background:none; position: fixed;border-radius: 35px; bottom: 0; margin: 0 0 10px 10px; z-index: 9999;" /></a>
    <style>
        /* ... (Your existing styles) ... */

        .contact-info {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .contact-details {
            /* New class for contact details */
            flex: 1;
        }

        .contact-image {
            flex: 1;
            text-align: center;
            margin-bottom: 20px;
            /* Space below image on smaller screens */
        }

        .contact-image img {
            max-width: 100%;
            height: auto;
        }

        .contact-form {
            flex: 1;
        }

        .contact-details p a {
            color: rgb(20, 20, 20) !important;
            /* Or any other dark color you prefer */
        }

        .contact-details p {
            /* Style for contact detail paragraphs */
            margin-bottom: 10px;
            color: rgb(20, 20, 20) !important;
        }

        .contact-details h3 {
            /* Style for charity shop heading */
            margin-top: 20px;
        }

        .contact-details i {
            /* Style for icons */
            margin-right: 5px;
            color: #ED6436;

            /* Orange color for icons */
        }


        /* Orange color */
        .text-primary,
        .btn-primary,
        h1,
        h2,
        h3,
        c {
            color: rgb(8, 8, 8);
        }

        .btn-primary {
            background-color: rgb(233, 81, 30);
            border-color: #ED6436;
        }

        .btn-primary:hover {
            background-color: rgb(16, 15, 15) !important;
            border-color: #D14F1F !important;
        }

        /* Style adjustments for smaller screens */
        @media (max-width: 768px) {
            .contact-info {
                flex-direction: column;
                align-items: center;
            }

            .contact-image {
                margin-bottom: 20px;
            }
        }

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

        .feedback-container {
            max-width: 600px;
            margin: auto;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0.6, 0.9);
            background: white;
            position: relative;
            overflow: hidden;
        }

        .feedback-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .feedback-slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        .username {
            font-size: 20px;
            font-weight: bold;
            color: #ED6436;
        }

        .stars {
            color: gold;
            font-size: 20px;
        }

        .feedback-text {
            white-space: normal;
            /* Allows text to wrap */
            word-wrap: break-word;
            /* Break long words if necessary */
            overflow-wrap: break-word;
            /* Ensures text wraps properly */
            max-width: 100%;
            /* Prevents overflow */
            text-align: center;
            padding: 10px;
        }


        /* Dots below slider */
        .dots {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .dot {
            height: 12px;
            width: 12px;
            margin: 0 5px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: #ED6436;
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
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3">Contact Us</h4>
            <h1 class="display-4 m-0">Contact For <span class="text-primary">Any Query</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-info">
                    <div class="contact-details">
                        <p>Please contact us by email or use the contact form.</p><br>
                        <p><a href="mailto:petlover25438@gmail.com"><i class="fas fa-envelope"></i> petlover25438@gmail.com</a></p>
                        <p><i class="fas fa-phone"></i>+916351265933</p><br>
                        <p>Phone lines are open 7 days per week 8am to 9pm.</p><br>
                        <p><i class="fas fa-map-marker-alt"></i> You can visit us at:<br>
                            62,satadhar soc,a.k road,surat,india<br>(next to Attwoolls).
                        </p><br>
                        <p>Opening times are shown at the bottom of each page.</p><br>
                        <p><i class="fas fa-map-marker-alt"></i> 62,satadhar soc,a.k road,surat,india
                        </p>
                        <p><i class="fas fa-phone"></i> +916351265933</p>
                    </div>
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" name="name" class="form-control p-4" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control p-4" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" name="subject" class="form-control p-4" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control p-4" name="message" rows="6" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-n2 p-0">
            </div>
        </div>
    </div>
    <center>
        <h3>User Feedback</h3>
    </center>
    <div class="container mt-5">
        <div class="feedback-container">
            <div id="feedback-slider">
                <?php if (!empty($feedbacks)) : ?>
                    <?php foreach ($feedbacks as $index => $feedback) : ?>
                        <div class="feedback-slide <?= $index == 0 ? 'active' : 'd-none' ?>">
                            <p class="username"><?= htmlspecialchars($feedback['NAME']) ?></p>
                            <p class="feedback-text"><?= htmlspecialchars($feedback['MESSAGE']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No feedback available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Dots -->
    <div class="dots">
        <?php foreach ($feedbacks as $index => $feedback) : ?>
            <span class="dot" onclick="moveToSlide(<?= $index ?>)"></span>
        <?php endforeach; ?>
    </div><br><br>
    <div class="container-fluid">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.258304091357!2d72.8491690752997!3d21.221603381127068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f1e288bd32b%3A0xe522e7ed83a9cde8!2s62%2C%20Satadhar%20Society%2C%20Dharam%20Nagar%20Society%2C%20Anand%20Nagar%2C%20Surat%2C%20Gujarat%20395008!5e0!3m2!1sen!2sin!4v1736519855285!5m2!1sen!2sin" width="100%" height="450" style="border:2px solid black; border-radius:10px; left:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <?php
    include 'footer.php';
    ?>
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Validate the form
            if (!validateForm()) {
                return; // Stop submission if validation fails
            }

            var formData = new FormData(this);

            fetch('insert1.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    var popup = document.createElement('div');
                    popup.id = 'popupMessage';
                    popup.textContent = data;
                    popup.className = 'popup';
                    popup.classList.add(data.includes('Error') ? 'error' : 'success');
                    popup.style.display = 'block';

                    document.body.appendChild(popup); // Append the popup to the body

                    setTimeout(() => {
                        popup.style.display = 'none';
                        document.body.removeChild(popup); // Remove the popup after it is hidden
                    }, 5000); // Hide after 5 seconds
                })
                .catch(error => {
                    var popup = document.createElement('div');
                    popup.id = 'popupMessage';
                    popup.textContent = 'An error occurred: ' + error;
                    popup.className = 'popup error';
                    popup.style.display = 'block';

                    document.body.appendChild(popup); // Append the popup to the body

                    setTimeout(() => {
                        popup.style.display = 'none';
                        document.body.removeChild(popup); // Remove the popup after it is hidden
                    }, 5000); // Hide after 5 seconds
                });
        });

        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const subject = document.getElementById('subject').value.trim();
            const message = document.getElementById('message').value.trim();

            // Check for empty fields
            if (!name || !email || !subject || !message) {
                showPopup('All fields are required.', 'error');
                return false; // Validation failed
            }

            // Validate email format
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!emailPattern.test(email)) {
                showPopup('Please enter a valid email address.', 'error');
                return false; // Validation failed
            }

            return true; // Validation passed
        }

        function showPopup(message, type) {
            var popup = document.createElement('div');
            popup.id = 'popupMessage';
            popup.textContent = message;
            popup.className = 'popup ' + (type === 'error' ? 'error' : 'success');
            popup.style.display = 'block';

            document.body.appendChild(popup); // Append the popup to the body

            setTimeout(() => {
                popup.style.display = 'none';
                document.body.removeChild(popup); // Remove the popup after it is hidden
            }, 5000); // Hide after 5 seconds
        }

        let currentSlide = 0;
        const slides = document.querySelectorAll('.feedback-slide');
        const dots = document.querySelectorAll('.dot');
        const totalSlides = slides.length;

        function moveToSlide(index) {
            slides[currentSlide].classList.add('d-none');
            slides[currentSlide].classList.remove('active');
            dots[currentSlide].classList.remove('active');

            slides[index].classList.remove('d-none');
            slides[index].classList.add('active');
            dots[index].classList.add('active');

            currentSlide = index;
        }

        // Auto-slide every 2 seconds
        function autoSlide() {
            let nextSlide = (currentSlide + 1) % totalSlides;
            moveToSlide(nextSlide);
        }

        // Start auto-slide
        let slideInterval = setInterval(autoSlide, 2000);

        // Allow manual navigation and reset timer on click
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                clearInterval(slideInterval); // Stop auto-slide
                moveToSlide(index);
                slideInterval = setInterval(autoSlide, 2000); // Restart auto-slide
            });
        });

        // Set active class to the first dot initially
        dots[currentSlide].classList.add('active');
    </script>

    <style>
        #popupMessage {
            display: none;
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 15px;
            background-color: #28a745;
            /* Green background for success */
            color: white;
            border-radius: 5px;
            z-index: 1000;
        }

        #popupMessage.error {
            background-color: #dc3545;
            /* Red background for errors */
        }
    </style>




</body>

</html>