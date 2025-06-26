<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer with Us - Pet Lovers</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.8;
            background-color: #fff5f0;
            color: #333;
        }

        .hero {
            background: url('https://img.freepik.com/premium-photo/large-group-cats-dogs-looking-camera-blue-background_191971-28557.jpg?w=2000') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 50px;
            position: relative;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Dark overlay for better readability */
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .hero a:hover {
            text-decoration: none;
            color: while;
        }

        .btnn {
            display: inline-block;
            background: #ff5e62;
            color: white;
            padding: 12px 20px;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }

        .btnn:hover {
            background: #fff;
            box-shadow: 0px 4px 8px rgba(255, 94, 98, 0.4);
        }


        .section {
            padding: 50px 20px;
            text-align: center;
            max-width: 1000px;
            margin: auto;
        }

        .section h2 {
            color: #ED6436;
        }

        .section p {
            text-align: justify;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .icon {
            font-size: 2.5em;
            color: #ED6436;
            margin-bottom: 15px;
        }

        .tabs {
            margin-top: 30px;
        }

        .tab-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .tab-button {
            background: none;
            border: 2px solid transparent;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1em;
            transition: 0.3s;
            font-weight: bold;
        }

        .tab-button.active {
            border-bottom: 3px solid #ED6436;
            color: #ED6436;
        }

        .tab-content {
            display: none;
            text-align: center;
        }

        .tab-content.active {
            display: block;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .testimonial {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
        }

        .testimonial:hover {
            transform: translateY(-5px);
        }

        /* Centered Form Container */
        .containerbg {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
        }

        /* Section Title */
        .section-title {
            font-size: 26px;
            color: #333;
            margin-bottom: 18px;
            font-weight: 600;
            text-align: center;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 14px;
            text-align: left;
        }

        label {
            font-size: 15px;
            font-weight: 500;
            color: #444;
            display: block;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
        }

        /* Input Focus Effect */
        input:focus,
        select:focus,
        textarea:focus {
            border-color: #ED6436;
            outline: none;
            box-shadow: 0px 0px 6px rgba(237, 100, 54, 0.3);
        }

        textarea {
            height: 90px;
            resize: vertical;
        }

        /* Submit Button */
        .btn-submit {
            background: #ED6436;
            color: #fff;
            padding: 11px 18px;
            font-size: 17px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            font-weight: 600;
        }

        .btn-submit:hover {
            background: #d35530;
            box-shadow: 0px 3px 6px rgba(237, 100, 54, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 85%;
                padding: 20px;
            }

            .section-title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <?php include 'header.php';
    include 'track.php' ?>

    <section class="hero">
        <div class="hero-content">
            <h1>Make a Paw-sitive Difference: Volunteer Today!</h1>
            <p>Join our community of passionate pet lovers and help us create brighter futures for animals in need.</p>
            <a href="#last-apply-btn" class="btnn">Become a Volunteer</a>
        </div>
    </section>

    <section class="section">
        <h2>Why Your Time Matters</h2>
        <p>Volunteering at our pet shelter means bringing joy, care, and comfort to animals in need. Whether it's feeding, socializing, or assisting in rescue efforts, your time makes a real impact.</p>
        <div class="card-grid">
            <div class="card">
                <i class="icon">🐾</i>
                <h3>Make a Direct Impact</h3>
                <p>Provide care, comfort, and love to animals in our shelter.</p>
            </div>
            <div class="card">
                <i class="icon">👥</i>
                <h3>Join a Community</h3>
                <p>Be a part of a network of passionate animal lovers.</p>
            </div>
            <div class="card">
                <i class="icon">💡</i>
                <h3>Develop Skills</h3>
                <p>Gain hands-on experience in pet care, handling, and event organization.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>How You Can Help</h2>
        <div class="tabs">
            <div class="tab-buttons">
                <button class="tab-button active" data-tab="animal-care">Animal Care</button>
                <button class="tab-button" data-tab="events">Events & Fundraising</button>
                <button class="tab-button" data-tab="foster">Foster Care</button>
                <button class="tab-button" data-tab="admin">Admin & Support</button>
            </div>
            <div class="tab-contents">
                <div class="tab-content active" id="animal-care">
                    <p>Assist with feeding, grooming, cleaning, and providing basic care for shelter animals. Your role includes walking dogs, socializing cats, and ensuring their living spaces are clean and comfortable. By spending time with the animals, you help them develop trust and confidence, increasing their chances of adoption. Volunteers will also assist in monitoring animal health and reporting any concerns. This is a hands-on role that makes a direct impact on the well-being of animals in our care.</p>
                </div>
                <div class="tab-content" id="events">
                    <p>Help organize and manage fundraising events and adoption drives. As a volunteer, you will assist in event planning, setting up booths, engaging with the public, and promoting our mission. Whether it's a charity walk, pet adoption fair, or donation drive, your contribution will play a key role in supporting our shelter. You'll also have the chance to develop communication and teamwork skills while interacting with fellow animal lovers. Join us in creating successful events that bring communities together for a great cause.</p>
                </div>
                <div class="tab-content" id="foster">
                    <p>Provide a temporary loving home for animals in need. Many pets require foster care due to medical recovery, socialization needs, or shelter overcrowding. As a foster parent, you'll offer a safe and caring environment until they find a permanent home. Your support helps reduce stress for these animals and prepares them for a better future. Foster families receive guidance, supplies, and veterinary care support as needed. Open your home and heart to a pet in need and be a part of their journey to a forever home.</p>
                </div>
                <div class="tab-content" id="admin">
                    <p>Assist with administrative work, social media, and event planning. Volunteers in this role help manage records, respond to inquiries, and organize shelter activities. Social media management includes posting updates, sharing adoption success stories, and engaging with our online community. Your efforts will help raise awareness and increase community involvement. If you have strong organizational or marketing skills, this is a great way to contribute to our cause. Be a vital part of our operations by ensuring everything runs smoothly behind the scenes.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Testimonials</h2>
        <div class="testimonial-grid">
            <div class="testimonial">
                <p>"Volunteering here has changed my life! Seeing happy animals is the best reward."</p>
                <p>- Sarah, Volunteer</p>
            </div>
            <div class="testimonial">
                <p>"The community here is amazing, and I love helping pets find forever homes!"</p>
                <p>- John, Dog Walker</p>
            </div>
        </div>
    </section>

    <!-- Section for Volunteer Invitation -->
    <section class="section">
        <h2>Ready to Join Us?</h2>
        <p>Apply now and start making a difference!</p>
        <p>Become a part of our compassionate community and help transform the lives of animals in need. Whether you want to assist with animal care, foster a pet, or support our events, your contribution makes a real impact. Volunteering with us is a rewarding experience where you can learn new skills, meet like-minded people, and bring joy to countless animals. No matter how much time you can give, every effort counts. Apply now and take the first step toward making a difference!</p>
        <a href="javascript:void(0);" class="btn" onclick="toggleForm()" id="last-apply-btn">Apply Now</a>
    </section>

    <!-- Hidden Volunteer Form -->
    <section id="volunteer-form" class="form-section" style="display: none;">
        <div class="containerbg">
            <h2 class="section-title">Volunteer Registration</h2>
            <form action="volunteer.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter Your Full Name" required pattern="^[A-Za-z\s]{3,50}$"
                        title="Name should contain only letters and spaces (3-50 characters)">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your Email" required
                        pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                        title="Enter a valid email (e.g., example@mail.com)">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter Your Mobile number" required
                        pattern="^[6-9]\d{9}$"
                        title="Enter a valid 10-digit phone number (starting with 6-9)">
                </div>
                <div class="form-group">
                    <label for="category">Gender:</label>
                    <select id="category" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" placeholder="Enter Your Age" required
                        min="18" max="48"
                        title="Age must be between 18 and 48">
                </div>

                <div class="form-group">
                    <label for="skills">Skills:</label>
                    <input type="text" id="skills" name="skills" placeholder="Enter your skills" required
                        pattern="^[A-Za-z0-9\s,.-]{3,100}$"
                        title="Only letters, numbers, spaces, commas, dots, and hyphens (3-100 characters)">
                </div>
                <div class="form-group">
                    <label for="availability">Availability:</label>
                    <select id="availability" name="availability" required>
                        <option value="weekend">Weekend</option>
                        <option value="flexible">Flexible</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </div>
    </section>

    <!-- Footer Inclusion -->
    <?php include 'footer.php'; ?>

    <!-- Script for Tab Navigation -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".tab-button");
            const contents = document.querySelectorAll(".tab-content");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    buttons.forEach(btn => btn.classList.remove("active"));
                    contents.forEach(content => content.classList.remove("active"));

                    this.classList.add("active");
                    document.getElementById(this.getAttribute("data-tab")).classList.add("active");
                });
            });
        });
    </script>

    <!-- Script to Toggle Volunteer Form -->
    <script>
        function toggleForm() {
            var form = document.getElementById("volunteer-form");
            form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
        }
    </script>

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
</body>

</html>

<?php
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Form Data & Escape Special Characters
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $availability = mysqli_real_escape_string($conn, $_POST['availability']);

    // SQL Insert Query
    $sql = "INSERT INTO volunteers (name, email, phone, gender, age ,skills, availability) 
            VALUES ('$name', '$email', '$phone', '$gender', '$age', '$skills', '$availability')";

    // Execute Query and Provide Feedback
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
    }
}

// Close Connection
$conn->close();
?>