<?php
include 'header.php';
include 'track.php';
?>
<?php
// Include database connection
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $vaccination = $_POST['vaccination'];
    $special_needs = $_POST['special_needs'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $user_name = $_POST['user_name'];
    $user_mobile = $_POST['user_mobile'];
    $user_email = $_POST['user_email'];
    $donation_date = date("Y-m-d");

    // File Upload Handling
    $image = $_FILES["image"]["name"];
    $tempName = $_FILES["image"]["tmp_name"];

    if (!empty($image)) {
        $imageExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowedExt)) {
            $imageName = time() . '_' . uniqid() . '.' . $imageExt;
            $targetDirectory = "upload/" . $imageName;
            move_uploaded_file($tempName, $targetDirectory);
        } else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
            exit;
        }
    } else {
        $targetDirectory = "";
    }

    $user_check_query = "SELECT * FROM user WHERE email = ?";
    $user_stmt = $conn->prepare($user_check_query);
    $user_stmt->bind_param("s", $user_email);
    $user_stmt->execute();
    $user_result = $user_stmt->get_result();

    if ($user_result->num_rows === 0) {
        // User not registered
        $message = "<div class='alert alert-danger'>Please login first to donate a pet.</div>";
    } else {
        // Store data in the database
        $query = "INSERT INTO pet_donations (pet_name, breed, age, gender, vaccination, special_needs, description, location, image_path, user_name, user_mobile, user_email, donation_date) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param(
                "ssissssssssss",
                $pet_name,
                $breed,
                $age,
                $gender,
                $vaccination,
                $special_needs,
                $description,
                $location,
                $targetDirectory,
                $user_name,
                $user_mobile,
                $user_email,
                $donation_date
            );

            if ($stmt->execute()) {
                $message = "<div class='alert alert-success'>Thank you for donating your pet. We will contact you soon.</div>";
            } else {
                $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } else {
            die("SQL Error: " . $conn->error);
        }
    }
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Donation Form</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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

        /* Form Container */
        .container {
            width: 100%;
            max-width: 600px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);

        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 22px;
            margin-bottom: 20px;
        }

        /* Form Fields */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #4a90e2;
            outline: none;
        }

        /* Submit Button */
        input[type="submit"] {
            background: linear-gradient(135deg, #4a90e2, #007bff);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            padding: 12px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            display: block;
            width: 100%;
        }


        input[type="submit"]:hover {
            background: linear-gradient(135deg, #007bff, #0056b3);
        }

        /* Submit Button */
        input[type="button"] {
            background: linear-gradient(135deg, #4a90e2, #007bff);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            padding: 12px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            display: block;
            width: 100%;
        }


        input[type="button"]:hover {
            background: linear-gradient(135deg, #007bff, #0056b3);
        }

        /* Image Preview */
        #image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        #image-preview img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.2);
        }

        /* Checkbox */
        .form-group input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                max-width: 100%;
                padding: 20px;
            }
        }

        .containerr {
            width: 100%;
            max-width: 100%;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);

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
    <div class="containerr">
        <h2>How to Donate a Pet</h2>
        <p>Before donating a pet, please follow these steps:</p>
        <ol>
            <li><strong>Login First:</strong> You need to log in to your account before proceeding with an donate request.</li>
            <li><strong>Fill Out the Adoption Form:</strong> Provide necessary details about yourself and your donate preferences.</li>
            <li><strong>Wait for Admin Approval:</strong> Our team will review your request and approve it if everything is in order.</li>
            <li><strong>Fix a Meeting with Admin:</strong> After approval, schedule a meeting with the admin to complete the donate process.</li>
            <li>
                <strong>Admin Response:</strong>
                <ul>
                    <li><strong>Approval:</strong> If your request is approved, you will receive further instructions to proceed with the donating process.</li>
                    <li><strong>Rejection:</strong> If your request is rejected, you will be notified with a reason. Possible reasons include incomplete details, ineligibility, or other concerns.</li>
                </ul>
            </li>
            <li><strong>Fix a Meeting with Admin:</strong> After approval, Our team will contact you to schedule a meeting and guide you through the next steps of the donating process.</li>
        </ol>
    </div><br><br>


    <!-- Display message -->
    <?php if (!empty($message)) echo $message; ?>
    <div class="container">
        <h2>Donate a Pet</h2>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Pet Name:</label>
                <input type="text" name="pet_name" placeholder="Enter Pet Name" required>
            </div>
            <div class="form-group">
                <label>Breed:</label>
                <input type="text" name="breed" placeholder="Enter Pet Breed" required>
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input type="number" name="age" min="0" max="20" placeholder="Enter Pet Age" required>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <select name="gender" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Vaccination Status:</label>
                <select name="vaccination" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label>Special Needs:</label>
                <input type="text" name="special_needs" placeholder="Enter Your Need" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" rows="3" placeholder="Enter Your Description" required></textarea>
            </div>
            <div class="form-group">
                <label>Location:</label>
                <input type="text" name="location" placeholder="Enter Your Correct Address" required>
            </div>
            <div class="form-group">
                <label>Your Name:</label>
                <input type="text" name="user_name" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group">
                <label>Mobile Number:</label>
                <input type="text" name="user_mobile" pattern="[0-9]{10}" placeholder="Enter Your Mobile Number" required>
            </div>
            <div class="form-group">
                <label>Email Address:</label>
                <input type="email" name="user_email" placeholder="Enter your Email" required>
            </div>
            <div class="form-group">
                <label>Upload Pet Images:</label>
                <input type="file" name="image" id="image-input" accept="image/*" multiple placeholder="Upload Your Pet Pic" required>
                <div id="image-preview"></div>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" required> I agree to the terms and conditions
                </label>
            </div>
            <input type="submit" value="Donate Pet"><br>
        </form>
        <input type="button" value="Cancel" onclick="location.reload();">

    </div>
    <script>
        document.getElementById("image-input").addEventListener("change", function(event) {
            const previewContainer = document.getElementById("image-preview");
            previewContainer.innerHTML = ""; // Clear previous previews

            const files = event.target.files;
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imgElement = document.createElement("img");
                        imgElement.src = e.target.result;
                        previewContainer.appendChild(imgElement);
                    };

                    reader.readAsDataURL(file);
                }
            }
        });

        setTimeout(function() {
            var alertBox = document.querySelector('.alert');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }, 2000); // 2000 milliseconds = 2 seconds
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <?php
    include 'footer.php';
    ?>
</body>

</html>