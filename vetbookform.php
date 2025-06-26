<?php
include 'header.php';
include 'connect.php'; // Ensure database connection is included
include 'track.php'; // Ensure database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data with validation
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $consultation_date = isset($_POST['date']) ? $_POST['date'] : '';
    $time_slot = isset($_POST['time_slot']) ? $_POST['time_slot'] : '';
    $pet = isset($_POST['pet']) ? $_POST['pet'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : 0;
    $weight = isset($_POST['weight']) ? $_POST['weight'] : 0;
    $language = isset($_POST['language']) ? $_POST['language'] : '';
    $address = isset($_POST['add']) ? $_POST['add'] : '';
    $issue = isset($_POST['issue']) ? $_POST['issue'] : '';
    $whatsapp = isset($_POST['wp']) ? $_POST['wp'] : '';

    // Check if user exists
    $user_check_query = "SELECT * FROM user WHERE email = ?";
    $user_stmt = $conn->prepare($user_check_query);
    $user_stmt->bind_param("s", $email);
    $user_stmt->execute();
    $user_result = $user_stmt->get_result();

    if ($user_result->num_rows === 0) {
        echo "<div id='message' class='alert alert-danger'>Please login first to adopt a pet.</div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = '/petlover/loginuser/login.php';
                }, 2000); // Wait for 2 seconds before redirecting
              </script>";
        exit();
    } else {
        // Insert into database
        $sql = "INSERT INTO consultations 
            (name, email, consultation_date, time_slot, pet_type, pet_gender, pet_age, pet_weight, language, address, issue, whatsapp) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssisssssss",
            $name,
            $email,
            $consultation_date,
            $time_slot,
            $pet,
            $gender,
            $age,
            $weight,
            $language,
            $address,
            $issue,
            $whatsapp
        );

        if ($stmt->execute()) {
            echo "<script>
                    alert('Form submitted successfully! We will contact you soon.');
                    window.location.href = 'vetbookform.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Error: " . $stmt->error . "');
                  </script>";
        }

        $stmt->close();
    }
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Vet Consultation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .alert {
            padding: 10px;
            margin: 15px 0;
            border-radius: 5px;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Container styling */
        .container {
            width: 60%;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        /* Description section */
        .description {
            width: 100%;
            margin-bottom: 20px;
            text-align: justify;
        }

        .description h2 {
            color: #013f73;
            font-size: 26px;
            text-align: center;
        }

        .description p {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        /* Form styling */
        .form-container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #013f73;
            font-size: 24px;
            text-align: center;
        }

        /* Labels */
        label {
            font-weight: bold;
            display: block;
            margin: 12px 0 5px;
            font-size: 14px;
            color: #013f73;
            text-align: justify;
        }

        /* Inputs, Select, and Textarea */
        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s ease-in-out;
            background: #fff;
        }

        /* Focus effect */
        input:focus,
        select:focus,
        textarea:focus {
            border-color: #013f73;
            box-shadow: 0px 0px 5px rgba(1, 63, 115, 0.5);
            outline: none;
        }

        /* Submit Button */
        .bk {
            width: 100%;
            padding: 12px;
            background: #013f73;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
        }

        .bk:hover {
            background: #02569b;
            box-shadow: 0px 4px 8px rgba(2, 86, 155, 0.3);
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            .form-container {
                width: 100%;
                padding: 15px;
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
    </style>
</head>

<body><br>
    <center>
        <h2>Book Your Vet Consultation</h2>
    </center>
    <div class="container">
        <div class="description">
            <h2>About Vet Consultation</h2>
            <p>Our online vet consultation service provides expert veterinary advice from the comfort of your home. Book a consultation to discuss your pet's health concerns and get professional guidance from experienced veterinarians.</p>
            <p>Whether your pet is experiencing health issues or you simply need routine advice, our team is here to help. Consultations are available in multiple languages to ensure clear communication.</p>
            <p>Our platform allows you to conveniently consult with a vet at your preferred time without the hassle of visiting a clinic.</p>
            <p>Emergency consultations are also available for critical cases, ensuring immediate medical attention when needed.</p>
            <p>We specialize in diagnosing common pet illnesses, providing dietary recommendations, and offering behavioral guidance to ensure your pet's well-being.</p>


        </div>
        <div id="popupMessage"></div>

        <div class="form-container">
            <h2>Book Your Vet Consultation</h2>
            <form action="" method="post" id="consultform">


                <label>Your Name</label>
                <input type=" text" name="name" placeholder="Enter Your Name" required>

                <label>Your Email</label>
                <input type="email" name="email" placeholder="Enter Your Email Address" required>

                <label>Pick a Date</label>
                <input type="date" name="date" placeholder="Select a date" min="<?= date('Y-m-d'); ?>" required>


                <label>Available Time Slots</label>
                <select name="time_slot" required>
                    <option value="" disabled selected>Select a Time</option>
                    <option value="10:00 AM - 10:30 AM">10:00 AM - 10:30 AM</option>
                    <option value="10:30 AM - 11:00 AM">10:30 AM - 11:00 AM</option>
                    <option value="11:00 AM - 11:30 AM">11:00 AM - 11:30 AM</option>
                    <option value="12:00 PM - 12:30 PM">12:00 PM - 12:30 PM</option>
                    <option value="12:30 PM - 01:00 PM">12:30 PM - 01:00 PM</option>
                    <option value="01:00 PM - 01:30 PM">01:00 PM - 01:30 PM</option>
                    <option value="01:30 PM - 02:00 PM">01:30 PM - 02:00 PM</option>
                    <option value="02:00 PM - 02:30 PM">02:00 PM - 02:30 PM</option>
                    <option value="02:30 PM - 03:00 PM">02:30 PM - 03:00 PM</option>
                    <option value="03:00 PM - 03:30 PM">03:00 PM - 03:30 PM</option>
                    <option value="03:30 PM - 04:00 PM">03:30 PM - 04:00 PM</option>
                    <option value="04:00 PM - 04:30 PM">04:00 PM - 04:30 PM</option>
                    <option value="04:30 PM - 05:00 PM">04:30 PM - 05:00 PM</option>
                    <option value="05:00 PM - 05:30 PM">05:00 PM - 05:30 PM</option>
                    <option value="05:30 PM - 06:00 PM">05:30 PM - 06:00 PM</option>
                </select>

                <label>Select your Pet</label>
                <select name="pet" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                </select>

                <label>Pet's Gender</label>
                <select name="gender" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label>Pet's Age</label>
                <input type="number" name="age" placeholder="Enter Your Pet age" required>

                <label>Pet's Weight</label>
                <input type="number" name="weight" placeholder="Enter Your Pet Weight" required>

                <label>Consultation Language</label>
                <select name="language" required>
                    <option value="" disabled selected>Select a Language for Consult</option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                </select>

                <label>Your Address</label>
                <input type="text" name="add" placeholder="Enter Your Permanent Address" required>

                <label>Describe your Pet's Issue</label>
                <textarea name="issue" placeholder="Enter Your Pet Issue" required></textarea>

                <label>Your WhatsApp Number</label>
                <input type="text" name="wp" placeholder="Enter Your Mobile Number" required>


                <button class="bk" type="submit">Book Consultation</button>
                <button type="submit" class="bk" onclick="location.reload();">Cancel </button>

            </form>
        </div>
    </div>

    <script>
        document.getElementById("consultform").addEventListener("submit", function(event) {
            event.preventDefault(); // Stop form submission for validation

            // Get form values
            let name = document.getElementsByName("name")[0].value.trim();
            let email = document.getElementsByName("email")[0].value.trim();
            let age = document.getElementsByName("age")[0].value.trim(); // Assuming you have an age field
            let weight = document.getElementsByName("weight")[0].value.trim();
            let phone = document.getElementsByName("wp")[0].value.trim();
            let popupMessage = document.getElementById("popupMessage");


            // Clear any previous messages
            popupMessage.innerHTML = "";

            // Name Validation: Only letters and spaces
            let nameRegex = /^[A-Za-z\s]+$/;

            if (!nameRegex.test(name)) {
                showPopupMessage("❌ Please enter a valid pet name (letters and spaces only).");
                return;
            }

            // Email Validation
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showPopupMessage("❌ Please enter a valid email address.");
                return;
            }

            // Age Validation
            if (age === "" || age < 2 || age > 30) {
                showPopupMessage("❌ Please enter a valid age between 1 and 30.");
                return;
            }

            // Weight Validation
            if (weight === "" || weight < 1 || weight > 100) {
                showPopupMessage("❌ Please enter a valid weight between 1 and 100 kg.");
                return;
            }

            // Mobile Number Validation: Exactly 10 digits
            let phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(phone)) {
                showPopupMessage("❌ Please enter a valid 10-digit mobile number (digits only).");
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
            popupMessage.scrollIntoView({
                behavior: "smooth",
                block: "center"
            }); // 👈 Scroll to popup message


        }
        // $(document).ready(function() {
        //     let today = new Date().toISOString().split("T")[0];
        //     $('#date').attr('min', today);

        //     const timeSlots = ["10:00 AM - 10:30 AM", "10:30 AM - 11:00 AM", "11:00 AM - 11:30 AM", "11:30AM - 12:00pm"];

        //     $('#date').on('change', function() {
        //         $('#time-slots').html('');
        //         timeSlots.forEach(time => {
        //             let timeButton = $('<div>').addClass('time-slot').text(time);
        //             timeButton.on('click', function() {
        //                 $('.time-slot').removeClass('selected');
        //                 $(this).addClass('selected');
        //                 $('#time_slot').val(time);
        //             });
        //             $('#time-slots').append(timeButton);
        //         });
        //     });

        //     $('input, select, textarea').on('input', function() {
        //         let isValid = true;
        //         $('input, select, textarea').each(function() {
        //             if (!$(this).val()) {
        //                 isValid = false;
        //             }
        //         });
        //         let timeSelected = $('.time-slot.selected').length > 0;
        //         $('#submit').prop('disabled', !(isValid && timeSelected));
        //         $('#submit').toggleClass('btn-disabled', !(isValid && timeSelected));
        //     });
        // });
    </script>

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
    <?php
    include 'footer.php';
    ?>
</body>

</html>