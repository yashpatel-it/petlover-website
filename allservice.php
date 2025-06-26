<?php
include 'header.php';
include 'track.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Services</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Header Styling */
        .header {
            text-align: center;
            padding: 20px;
            background-color: #ed6436;
            color: white;
            background-image: url('http://www.dogmal.com/wp-content/uploads/2016/09/How-to-take-Care-of-your-pets.png');
            background-repeat: no-repeat;
            background-size: cover;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        /* Service Container */
        .service {
            margin: 40px auto;
            padding: 30px;
            width: 80%;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .service:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .service img {
            width: 100%;
            height: 300px;
            border-radius: 12px;
        }

        h2 {
            color: #ed6436;
            font-size: 2rem;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        h3 {
            color: #444;
            font-size: 1.5rem;
            margin-top: 15px;
        }

        p,
        ul {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #666;
        }

        /* Comment Box Styling */
        .comment-box {
            display: flex;
            align-items: center;
            width: 100%;
            margin-top: 20px;
        }

        .comment-box input {
            flex: 1;
            padding: 12px;
            border: 2px solid #ed6436;
            border-radius: 8px;
            font-size: 1rem;
            transition: 0.3s;
        }

        .comment-box input:focus {
            border-color: #d32f2f;
            outline: none;
        }

        .comment-box a {
            background: #ed6436;
            border: none;
            color: white;
            padding: 12px 15px;
            margin-left: 10px;
            cursor: pointer;
            border-radius: 8px;
            text-decoration: none;
            font-size: 22px;
            text-align: center;
            transition: 0.3s;
        }

        .comment-box a:hover {
            background: #d32f2f;
        }

        /* Book Button */
        .book-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .book-btn {
            width: 180px;
            padding: 12px;
            text-align: center;
            background: linear-gradient(45deg, #ff7a5c, #ff3b3b);
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 8px;
            transition: 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .book-btn:hover {
            background: linear-gradient(45deg, #ff3b3b, #c1272d);
            transform: scale(1.05);
            text-decoration: none;
            color: #fff;
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

    <div class="header"></div>

    <!-- Pet Boarding Service -->
    <div class="service">
        <h2>Pet Boarding</h2>
        <p>We provide safe and comfortable boarding facilities for your pets while you are away. Our trained staff ensures proper care, feeding, and playtime to make their stay enjoyable.</p>
        <h3>How It Works:</h3>
        <p>Owners drop off their pets at our facility, where they are assigned comfortable spaces, fed nutritious meals, and engaged in playful activities under expert supervision.</p>
        <h3>Advantages:</h3>
        <ul>
            <li>24/7 Supervision</li>
            <li>Comfortable and clean kennels</li>
            <li>Daily exercise and socialization</li>
        </ul>
        <div class="comment-box">
            <input type="text" placeholder="Add Comment">
            <a href="#" class="comment-btn">📩</a>
        </div>
        <div class="book-container">
            <a href="booking.php" class="book-btn">Book Now</a>
        </div>
    </div>

    <!-- Pet Grooming Service -->
    <div class="service">
        <h2>Pet Grooming</h2>
        <p>Our grooming services keep your pet clean, healthy, and stylish. We offer haircuts, baths, nail trimming, and more.</p>
        <h3>How It Works :</h3>
        <p>Our professional groomers assess the pet’s coat and hygiene needs, then provide a tailored grooming session, including bathing, trimming, and nail care.</p>
        <h3>Advantages:</h3>
        <ul>
            <li>Improves hygiene</li>
            <li>Prevents infections</li>
            <li>Keeps coat healthy</li>
        </ul>
        <div class="comment-box">
            <input type="text" placeholder="Add Comment">
            <a href="#" class="comment-btn">📩</a>
        </div>
        <div class="book-container">
            <a href="booking.php" class="book-btn">Book Now</a>
        </div>
    </div>

    <!-- Pet Training Service -->
    <div class="service">
        <h2>Pet Training</h2>
        <p>Our expert trainers help pets learn commands, improve behavior, and enhance obedience.</p>
        <h3>How It Works :</h3>
        <p>Trainers evaluate your pet’s behavior and customize training programs using positive reinforcement techniques.</p>
        <h3>Advantages:</h3>
        <ul>
            <li>Better discipline</li>
            <li>Improves social skills</li>
            <li>Strengthens owner-pet bond</li>
        </ul>
        <div class="comment-box">
            <input type="text" placeholder="Add Comment">
            <a href="#" class="comment-btn">📩</a>
        </div>
        <div class="book-container">
            <a href="booking.php" class="book-btn">Book Now</a>
        </div>
    </div>

    <!-- Pet Exercise Service -->
    <div class="service">
        <h2>Pet Exercise</h2>
        <p>We offer structured exercise programs to keep your pets active, healthy, and energetic. Our customized workout plans ensure your pet gets the right amount of physical activity.</p>
        <h3>How It Works:</h3>
        <p>Our trainers assess your pet’s energy level and create an exercise routine that includes walking, running, agility training, and fun interactive activities.</p>
        <h3>Advantages:</h3>
        <ul>
            <li>Prevents obesity</li>
            <li>Boosts energy and mental well-being</li>
            <li>Improves behavior through structured activities</li>
        </ul>
        <div class="comment-box">
            <input type="text" placeholder="Add Comment">
            <a href="#" class="comment-btn">📩</a>
        </div>
        <div class="book-container">
            <a href="booking.php" class="book-btn">Book Now</a>
        </div>
    </div>

    <!-- Pet Feeding Service -->
    <div class="service">
        <h2>Pet Feeding</h2>
        <p>We provide balanced and nutritious meals tailored to your pet’s dietary needs. Our feeding services ensure they receive the right portion sizes at the right time.</p>
        <h3>How It Works:</h3>
        <p>After assessing your pet’s age, weight, and dietary restrictions, we create a meal plan that includes fresh, high-quality food, served at scheduled intervals.</p>
        <h3>Advantages:</h3>
        <ul>
            <li>Supports a healthy diet</li>
            <li>Reduces risk of deficiencies</li>
            <li>Timely feeding with proper portions</li>
        </ul>
        <div class="comment-box">
            <input type="text" placeholder="Add Comment">
            <a href="#" class="comment-btn">📩</a>
        </div>
        <div class="book-container">
            <a href="booking.php" class="book-btn">Book Now</a>
        </div>
    </div>

    <!-- Pet Treatment Service -->
    <div class="service">
        <h2>Pet Treatment</h2>
        <p>Our veterinary services ensure your pet’s health with expert medical check-ups, vaccinations, and treatments for common illnesses and injuries.</p>
        <h3>How It Works:</h3>
        <p>Experienced veterinarians perform health assessments, provide necessary medications, and monitor your pet’s condition to ensure quick recovery.</p>
        <h3>Advantages:</h3>
        <ul>
            <li>Expert veterinary care</li>
            <li>Prevention and early diagnosis</li>
            <li>Ensures overall health</li>
        </ul>
        <div class="comment-box">
            <input type="text" placeholder="Add Comment">
            <a href="#" class="comment-btn">📩</a>
        </div>
        <div class="book-container">
            <a href="booking.php" class="book-btn">Book Now</a>
        </div>
    </div>

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all comment buttons
            document.querySelectorAll(".comment-btn").forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent page refresh
                    let inputField = this.previousElementSibling; // Get the input field

                    if (inputField.value.trim() === "") {
                        alert("This field is required."); // Show an alert
                        inputField.focus(); // Set focus on the input field
                    } else {
                        alert("Comment submitted successfully!");
                        inputField.value = ""; // Clear input after submission
                    }
                });
            });
        });
    </script>

</body>

</html>