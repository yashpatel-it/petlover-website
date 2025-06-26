<?php
// Include database connection
require 'connect.php';
error_reporting(0);
ini_set('display_errors', 0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #66ccff, rgb(204, 85, 0));
            color: #fff;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #00509e;
            color: #fff;
        }

        .no-data {
            text-align: center;
            color: red;
        }

        input[type="email"] {
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: 2px solid #ccc;
            width: 100%;
            max-width: 350px;
            background-color: #fff;
            color: #333;
        }

        button {
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #ED6436;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c04c2c;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    include "./adminHeader.php";
    ?>
    <div class="container">
        <button onclick="window.history.back();"
            style="border: none; background: none; cursor: pointer; font-size: 20px;">
            <h2><i class="fa-solid fa-arrow-left" style="color: #FFD43B; font-size: 30px; "></i> Welcome to your profile!</h2>
        </button>

        <form method="POST" action="">
            <label for="email">Enter Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <button type="submit" name="search">Search</button>


            <?php if (isset($_POST['email']) && !empty($_POST['email'])) : ?>
                <a href="edit_profile.php?email=<?php echo urlencode($_POST['email']); ?>">
                    <button type="button">Edit Profile</button>
                </a>
            <?php endif; ?>

            <button type="submit" name="logout"><a href="logout.php" style="text-decoration: none; color:#fff;">Logout</a></button>


        </form>
        <?php
        include 'connect.php'; // Database connection

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            // Corrected query to check only for the logged-in user
            $sql = "SELECT ID, EMAIL, PASSWORD, status FROM user WHERE EMAIL = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);


            if ($row) {
                if ($row['status'] == 'deleted') {
                    echo "<script>
            alert('Your account has been deleted by the admin. Please log in using new account.');
            window.location = 'index.php'; // Redirect to home page
            </script>";
                    exit();
                } else {
                    echo "<script>alert('Your account is active.');</script>";
                }
            } else {
                // Case when the user is not found in the database
                echo "<script>
        alert('User not found. Please register or log in.');
        window.location = 'index.php'; // Redirect to registration page
        </script>";
                exit();
            }
        }
        ?>




        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve and sanitize the email input
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            // Query to fetch user information
            $sql_user = "SELECT * FROM user WHERE EMAIL = '$email'";
            $result_user = mysqli_query($conn, $sql_user);

            if (!$result_user) {
                die("User query failed: " . mysqli_error($conn));
            }

            echo "<h3>User Information</h3>";
            echo "<div style='overflow-x: auto; max-width: 100%;'>";
            echo "<table border='1' style='min-width: 1200px;'>"; // Set a minimum width if needed
            if (mysqli_num_rows($result_user) > 0) {
                $user_info = mysqli_fetch_assoc($result_user);

                // Display User Information
                echo "<table border=1>";
                echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Password</th></tr>";
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user_info['ID']) . "</td>";
                echo "<td>" . htmlspecialchars($user_info['FULLNAME']) . "</td>";
                echo "<td>" . htmlspecialchars($user_info['EMAIL']) . "</td>";
                echo "<td>
                <span id='password-mask'>••••••</span>
                <span id='password-reveal' style='display:none;'>" . htmlspecialchars($user_info['PASSWORD']) . "</span>
                <button type='button' onclick='togglePassword()' style='background:none; border:none; cursor:pointer;'>
                    <img src='https://tse1.mm.bing.net/th?id=OIP.V3pwYP1jK0L2sL54ZZax-QAAAA&pid=Api&P=0&h=180' alt='Show' style='width:20px; vertical-align:middle; border-radius:5px;' id='eye-icon'>
                </button>
                </td>";
                echo "</tr>";
                echo "</table><br><br>";

                // Query to fetch booking details
                $sql_bookings = "SELECT * FROM bookings WHERE email = '$email'";
                $result_bookings = mysqli_query($conn, $sql_bookings);

                if (!$result_bookings) {
                    die("Bookings query failed: " . mysqli_error($conn));
                }


                // Display Booking Information
                echo "<h2>Bookings</h2>";
                echo "<div style='overflow-x: auto; max-width: 100%;'>";
                echo "<table border='1' style='min-width: 1200px;'>"; // Set a minimum width if needed
                if (mysqli_num_rows($result_bookings) > 0) {
                    echo "<table border=1>";
                    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Date</th><th>Time</th><th>Service</th><th>Cancel Booking</th><th>Duration</th>    </tr>";
                    while ($row = mysqli_fetch_assoc($result_bookings)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phoneno']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['reservation_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['reservation_time']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['service']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                        echo "<td><a href='cancel_booking.php?email=" . urlencode($row['email']) . "&table=bookings&id=" . $row['id'] . "'><button>Cancel</button></a></td>";
                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                } else {
                    echo "<p class='no-data'>No bookings found.</p>";
                }

                // Query to fetch adoption request details
                $sql_adoptions = "SELECT * FROM adoption_requests WHERE email = '$email'";
                $result_adoptions = mysqli_query($conn, $sql_adoptions);

                if (!$result_adoptions) {
                    die("Adoption requests query failed: " . mysqli_error($conn));
                }

                // Display Adoption Requests
                echo "<h2>Adoption Requests</h2>";
                echo "<div style='overflow-x: auto; max-width: 100%;'>";
                echo "<table border='1' style='min-width: 1200px;'>"; // Set a minimum width if needed
                if (mysqli_num_rows($result_adoptions) > 0) {
                    echo "<table border='1'>";
                    echo "<tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Pre-Adoption Check</th>
                        <th>Pet Name</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Profession</th>
                        <th>Phone</th>
                        <th>Area</th>
                        <th>Residence</th>
                        <th>Landlord Permission</th>
                        <th>Family Agreement</th>
                        <th>Caretaker</th>
                        <th>Past Experience</th>
                        <th>Pet Location</th>
                        <th>Adoption Reason</th>
                        <th>Alone Hours</th>
                        <th>Diet</th>
                        <th>House Check</th>
                        <th>Referral</th>
                        <th>Additional Notes</th>
                        <th>Date</th>
                        <th>Request Status</th>
                        <th>cancel Request</th>

                    </tr>";

                    while ($row = mysqli_fetch_assoc($result_adoptions)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["pre_adoption_check"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["pet_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["age"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["profession"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["area"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["residence"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["landlord_permission"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["family_agreement"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["caretaker"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["past_experience"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["pet_location"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["adoption_reason"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["alone_hours"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["diet"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["house_check"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["referral"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["additional_notes"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["adoption_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                        echo "<td><a href='cancel_adoption.php?email=" . urlencode($row['email']) . "&table=bookings&id=" . $row['id'] . "'><button>Cancel</button></a></td>";
                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                } else {
                    echo "<p class='no-data'>No adoption requests found.</p>";
                }





                // Query to fetch adoption request details
                $sql_donate = "SELECT * FROM pet_donations WHERE user_email = '$email'";
                $result_donate = mysqli_query($conn, $sql_donate);

                if (!$result_donate) {
                    die("Donate requests query failed: " . mysqli_error($conn));
                }

                // Display Adoption Requests
                echo "<h2>Donate Pet Requests</h2>";
                echo "<div style='overflow-x: auto; max-width: 100%;'>";
                echo "<table border='1' style='min-width: 1200px;'>"; // Set a minimum width if needed
                if (mysqli_num_rows($result_donate) > 0) {
                    echo "<table border='1'>";
                    echo "<tr>
                        <th>ID</th>
                        <th>Pet_Name</th>
                        <th>Breed</th>
                        <th>Age</th>
                        <th>Gender Name</th>
                        <th>Vaccination</th>
                        <th>Special_need</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>Owner Name</th>
                        <th>Mobile No</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Request Status</th>
                        <th>Cancel Donate Request</th>
                    </tr>";

                    while ($row = mysqli_fetch_assoc($result_donate)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["pet_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["breed"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["age"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["vaccination"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["special_needs"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["location"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["image_path"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["user_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["user_mobile"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["user_email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["donation_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                        echo "<td><a href='cancel_donate.php?email=" . urlencode($row['user_email']) . "&table=bookings&id=" . $row['id'] . "'><button>Cancel</button></a></td>";

                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                } else {
                    echo "<p class='no-data'>No Donate pet requests found.</p>";
                }

                // Query to fetch Consultation messages

                echo "<h2>Vet consult Requests</h2>";

                $sql_consult = "SELECT * FROM consultations WHERE email = '$email'";
                $result_consult = mysqli_query($conn, $sql_consult);

                if (mysqli_num_rows($result_consult) > 0) {
                    echo "<table border=1>";
                    echo "<tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Pet Type</th>
                        <th>Pet Gender</th>
                        <th>Pet Age</th>
                        <th>Pet Weight</th>
                        <th>Language</th>
                        <th>Address</th>
                        <th>Issue</th>
                        <th>WhatsApp</th>
                        <th>Cancel Consult Request</th>
                    </tr>";

                    while ($row = mysqli_fetch_assoc($result_consult)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['consultation_date']) . "</td>"; // Fixed
                        echo "<td>" . htmlspecialchars($row['time_slot']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['pet_type']) . "</td>"; // Fixed
                        echo "<td>" . htmlspecialchars($row['pet_gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['pet_age']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['pet_weight']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['language']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['address']) . "</td>"; // Fixed
                        echo "<td>" . htmlspecialchars($row['issue']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['whatsapp']) . "</td>"; // Fixed
                        echo "<td><a href='cancel_consult.php?email=" . urlencode($row['email']) . "&table=bookings&id=" . $row['id'] . "'><button>Cancel</button></a></td>";
                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                } else {
                    echo "<p class='no-data'>No consult messages found.</p>";
                }



                // Query to fetch contact messages
                $sql_contacts = "SELECT * FROM contact_form_submissions WHERE email = '$email'";
                $result_contacts = mysqli_query($conn, $sql_contacts);

                if (!$result_contacts) {
                    die("Contacts query failed: " . mysqli_error($conn));
                }

                // Display Contact Messages
                echo "<h2>Contact Messages</h2>";
                if (mysqli_num_rows($result_contacts) > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Name</><th>EMAIL</th><th>SUBJECT</th><th>MESSAGE</th></tr>";
                    while ($row = mysqli_fetch_assoc($result_contacts)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['message']) . "</td>"; // Adjust column as per your schema
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class='no-data'>No contact messages found.</p>";
                }


                // Query to fetch contact messages
                $sql_contacts = "SELECT * FROM volunteers WHERE email = '$email'";
                $result_contacts = mysqli_query($conn, $sql_contacts);

                if (!$result_contacts) {
                    die("Contacts query failed: " . mysqli_error($conn));
                }

                // Display Contact Messages
                echo "<h2>Apply for Volunteer Request</h2>";
                if (mysqli_num_rows($result_contacts) > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Name</><th>EMAIL</th><th>PHONE</th><th>CATEGORY</th><th>AGE</th><th>skills</th><th>AVAILIBILITY</th><th>REQUEST STATUS</th></tr>";
                    while ($row = mysqli_fetch_assoc($result_contacts)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>"; // Adjust column as per your schema
                        echo "<td>" . htmlspecialchars($row['age']) . "</td>"; // Adjust column as per your schema
                        echo "<td>" . htmlspecialchars($row['skills']) . "</td>"; // Adjust column as per your schema
                        echo "<td>" . htmlspecialchars($row['availability']) . "</td>";
                        echo "<td>" . htmlspecialchars($row["status"]) . "</td>"; // Adjust column as per your schema
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class='no-data'>No contact messages found.</p>";
                }
            } else {
                echo "<p class='no-data'>No user found with the provided email.</p>";
            }
        }
        ?>
    </div>
</body>
<script>
    function togglePassword() {
        const mask = document.getElementById('password-mask');
        const reveal = document.getElementById('password-reveal');
        const eyeIcon = document.getElementById('eye-icon');

        if (mask.style.display === 'none') {
            mask.style.display = 'inline';
            reveal.style.display = 'none';
            eyeIcon.src = 'https://tse1.mm.bing.net/th?id=OIP.V3pwYP1jK0L2sL54ZZax-QAAAA&pid=Api&P=0&h=180'; // Change to "eye closed" icon if available
            eyeIcon.alt = 'Show';
        } else {
            mask.style.display = 'none';
            reveal.style.display = 'inline';
            eyeIcon.src = 'https://tse1.mm.bing.net/th?id=OIP.V3pwYP1jK0L2sL54ZZax-QAAAA&pid=Api&P=0&h=180'; // Change to "eye open" icon if available
            eyeIcon.alt = 'Hide';
        }
    }
</script>

</html>

<?php
require 'connect.php';
$user_email = $_SESSION['user_email']; // Assuming user email is stored in session

$sql = "SELECT pet_name, status FROM adoption_requests WHERE email='$user_email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>Pet Name: " . $row['pet_name'] . " - Status: <b>" . ucfirst($row['status']) . "</b></p>";
    }
}
?>


<?php
require 'connect.php';
$user_email = $_SESSION['user_email']; // Assuming user email is stored in session

$sql = "SELECT pet_name, status FROM pet_donations WHERE email='$user_email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>Pet Name: " . $row['pet_name'] . " - Status: <b>" . ucfirst($row['status']) . "</b></p>";
    }
}
?>