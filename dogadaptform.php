<?php
include 'header.php';
include 'connect.php';
include 'track.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pre_adoption_check = $_POST['pre_adoption_check'];
    $pet_name = $_POST['pet_name'];
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $area = $_POST['area'];
    $landlord_permission = $_POST['landlord_permission'];
    $family_agreement = $_POST['family_agreement'];
    $caretaker = $_POST['caretaker'];
    $past_experience = $_POST['past_experience'];
    $pet_location = $_POST['pet_location'];
    $alone_hours = $_POST['alone_hours'];
    $diet = $_POST['diet'];
    $house_check = $_POST['house_check'];
    $referral = $_POST['referral'];
    $additional_notes = $_POST['additional_notes'];
    $adoption_date = date("Y-m-d");


    // Handling dynamic fields
    $profession = ($_POST['profession'] === 'Other') ? $_POST['other_profession'] : $_POST['profession'];
    $residence = ($_POST['residence'] === 'Other') ? $_POST['other_residence'] : $_POST['residence'];
    $adoption_reason = ($_POST['adoption_reason'] === 'Other') ? $_POST['other_reason'] : $_POST['adoption_reason'];

    $user_check_query = "SELECT * FROM user WHERE email = ?";
    $user_stmt = $conn->prepare($user_check_query);
    $user_stmt->bind_param("s", $email);
    $user_stmt->execute();
    $user_result = $user_stmt->get_result();

    if ($user_result->num_rows === 0) {
        // User not registered, show error and redirect
        $message = "<div class='alert alert-danger'>Please login first to adopt a pet.</div>";
    } else {
        // Insert into database
        $sql = "INSERT INTO adoption_requests 
            (email, pre_adoption_check, pet_name, full_name, age, profession, phone, area, residence, landlord_permission, 
            family_agreement, caretaker, past_experience, pet_location, adoption_reason, alone_hours, diet, house_check, referral, additional_notes, adoption_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "ssssissssssssssisssss",
            $email,
            $pre_adoption_check,
            $pet_name,
            $full_name,
            $age,
            $profession,
            $phone,
            $area,
            $residence,
            $landlord_permission,
            $family_agreement,
            $caretaker,
            $past_experience,
            $pet_location,
            $adoption_reason,
            $alone_hours,
            $diet,
            $house_check,
            $referral,
            $additional_notes,
            $adoption_date
        );

        if ($stmt->execute()) {
            $message = "<div class='alert alert-success'>Form submitted successfully! we conatct you soon.</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
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
    <title>Dog Adoption Form</title>
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

        .container1 {
            background: linear-gradient(to right, #66ccff, rgb(204, 85, 0));
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        h2 {
            text-align: center;
            color: #ed6436;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        select,
        input[type="text"],
        input[type="number"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .hidden {
            display: none;
        }

        .btnn {
            background: #ed6436;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
        }

        .btnn:hover {
            background: #d9532e;
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

        .containerr {
            width: 100%;
            max-width: 100%;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #66ccff, rgb(204, 85, 0));

        }


        /* Adoption Process Description */
        .containerr h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .containerr p {
            text-align: center;
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .containerr ol {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
        }

        .containerr ol li {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .containerr ol li strong {
            color: #007bff;
        }
    </style>

</head>

<body>

    <div class="containerr">
        <h2>How to Adopt a Pet</h2>
        <p>Before Adopting a pet, please follow these steps:</p>
        <ol>
            <li><strong>Login First:</strong> You need to log in to your account before proceeding with an adoption request.</li>
            <li><strong>Fill Out the Adoption Form:</strong> Provide necessary details about yourself and your adoption preferences.</li>
            <li><strong>Wait for Admin Approval:</strong> Our team will review your request and approve it if everything is in order.</li>
            <li><strong>Fix a Meeting with Admin:</strong> After approval, schedule a meeting with the admin to complete the adoption process.</li>
            <li>
                <strong>Admin Response:</strong>
                <ul>
                    <li><strong>Approval:</strong> If your request is approved, you will receive further instructions to proceed with the adoption process.</li>
                    <li><strong>Rejection:</strong> If your request is rejected, you will be notified with a reason. Possible reasons include incomplete details, ineligibility, or other concerns.</li>
                </ul>
            </li>
            <li><strong>Fix a Meeting with Admin:</strong> After approval, Our team will contact you to schedule a meeting and guide you through the next steps of the adoption process.</li>
        </ol>
    </div>
    <!-- Display message -->
    <?php if (!empty($message)) echo $message; ?>
    <div class="container1">
        <div class="container">
            <h2>Dog Adoption Form</h2>
            <div id="popupMessage"></div>
            <form action="dogadaptform.php" method="POST" id="adoptForm">
                <label>Email *</label>
                <input type="email" name="email" placeholder="Enter Your Email" required>

                <label>Do you agree to a pre-adoption house check? *</label>
                <select name="pre_adoption_check" required>
                    <option value="" disabled selected>Select a option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <label>Name of the pet you would like to adopt *</label>
                <input type="text" name="pet_name" placeholder="Enter Your Selected Pet Name" required>

                <label>Your Full Name *</label>
                <input type="text" name="full_name" placeholder="Enter Your Full name" required>

                <label>Your Age *</label>
                <input type="number" name="age" placeholder="Enter Your Age" required>

                <label>Your current profession? *</label>
                <select id="profession" name="profession" onchange="toggleInput('otherProfession', 'profession')" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Employee">Employee</option>
                    <option value="Student">Student</option>
                    <option value="Other">Other</option>
                </select>
                <input type="text" id="otherProfession" name="other_profession" class="hidden" placeholder="Please specify">

                <label>Phone Number *</label>
                <input type="text" name="phone" placeholder="Enter Your Phone Number" required>

                <label>Which area in Surat do you live in? *</label>
                <input type="text" name="area" placeholder="Enter Your Current Area" required>

                <label>Do you stay in an apartment or an individual house? *</label>
                <select id="residence" name="residence" onchange="toggleInput('otherResidence', 'residence')" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Individual House">Individual House</option>
                    <option value="Other">Other</option>
                </select>
                <input type="text" id="otherResidence" name="other_residence" class="hidden" placeholder="Please specify">

                <label>Do you have landlord's permission to have a pet? *</label>
                <select name="landlord_permission" required>
                    <option value="" disabled selected>Select a option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Yet to ask">Yet to ask</option>
                </select>

                <label>Has every family member agreed to adopt a pet? *</label>
                <select name="family_agreement" required>
                    <option value="" disabled selected>Select a option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Yet to ask">Yet to ask</option>
                </select>

                <label>Who will be the primary caretaker for the pet? *</label>
                <input type="text" name="caretaker" placeholder="Enter Pet Caretaker Name" required>

                <label>Have you ever raised a pet? *</label>
                <select name="past_experience" required>
                    <option value="" disabled selected>Select a option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <label>Where will the dog be kept during the day and night? *</label>
                <select name="pet_location" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Indoors">Indoors</option>
                    <option value="Indoors/Outdoors">Indoors/Outdoors</option>
                    <option value="Strictly Outdoors">Strictly Outdoors</option>
                </select>

                <label>Reason for adopting a pet now? *</label>
                <select id="reason" name="adoption_reason" onchange="toggleInput('otherReason', 'reason')" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Companion">Companion</option>
                    <option value="Guarding Purpose">Guarding Purpose</option>
                    <option value="Other">Other</option>
                </select>
                <input type="text" id="otherReason" name="other_reason" class="hidden" placeholder="Please specify">

                <label>Will the pet be left alone? If yes, for how many hours? *</label>
                <input type="number" name="alone_hours" placeholder="Enter Hours" required>

                <label>Diet plan for the pet? *</label>
                <select name="diet" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Packaged Food">Packaged Food</option>
                    <option value="Non-Veg Daily">Non-Veg Daily</option>
                    <option value="Vegetarian">Vegetarian</option>
                </select>

                <label>If required, do you agree to a house check? *</label>
                <select name="house_check" required>
                    <option value="" disabled selected>Select a option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <label>Where did you hear about us? *</label>
                <select name="referral" required>
                    <option value="" disabled selected>Select a option</option>
                    <option value="Website">Website</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Friend">Friend</option>
                </select>

                <label>Anything else you wish to add?</label>
                <textarea name="additional_notes" rows="4"></textarea>

                <button type="submit" class="btnn">Submit</button>
                <button type="submit" class="btnn" onclick="location.reload();">Cancel </button>

            </form>
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
        setTimeout(function() {
            var alertBox = document.querySelector('.alert');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }, 2000); // 2000 milliseconds = 2 seconds

        function toggleInput(id, selectId) {
            var select = document.getElementById(selectId);
            var input = document.getElementById(id);
            input.style.display = (select.value === "Other") ? "block" : "none";
        }

        document.getElementById("adoptForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Stop form submission for validation

            // Get form values
            let pet_name = document.getElementsByName("pet_name")[0].value.trim();
            let full_name = document.getElementsByName("full_name")[0].value.trim();
            let email = document.getElementsByName("email")[0].value.trim();
            let phone = document.getElementsByName("phone")[0].value.trim();
            let age = document.getElementsByName("age")[0].value.trim(); // Assuming you have an age field
            let caretaker = document.getElementsByName("caretaker")[0].value;
            let popupMessage = document.getElementById("popupMessage");


            // Clear any previous messages
            popupMessage.innerHTML = "";

            // Name Validation: Only letters and spaces
            let nameRegex = /^[A-Za-z\s]+$/;

            if (!nameRegex.test(pet_name)) {
                showPopupMessage("❌ Please enter a valid pet name (letters and spaces only).");
                return;
            }

            if (!nameRegex.test(full_name)) {
                showPopupMessage("❌ Please enter a valid full name (letters and spaces only).");
                return;
            }

            if (!nameRegex.test(caretaker)) {
                showPopupMessage("❌ Please enter a valid caretaker name (letters and spaces only).");
                return;
            }

            if (!nameRegex.test(caretaker)) {
                showPopupMessage("❌ Please enter a valid caretaker name (letters and spaces only).");
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


            // Age Validation
            if (age === "" || age < 5 || age > 100) {
                showPopupMessage("❌ Please enter a valid age between 1 and 20.");
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
    </script>
</body>

</html>