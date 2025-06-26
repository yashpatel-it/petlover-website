<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    header("Location: http://localhost/petlover/admin_panel/admin_login.php");
    exit();
}
?>
<!DOCTYPE html>

<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome 6.7.2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Settings Button */
        .settings-btn {
            position: absolute;
            top: 120px;
            right: 20px;
            background-color: #ff7f50;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
            transition: background 0.3s ease;
            z-index: 1000;
        }

        .settings-btn:hover {
            background-color: #ff6347;
        }

        /* Settings Menu */
        .settings-menu {
            position: fixed;
            top: 80px;
            /* Positioned above other components */
            right: 20px;
            background: rgba(72, 61, 139, 0.95);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
            color: white;
            z-index: 1100;

            /* Initially Hidden */
            display: none;
            opacity: 0;
            transform: translateY(-10px);
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* When the menu is active */
        .settings-menu.show {
            display: block;
            animation: fadeIn 0.3s ease forwards;
        }

        /* Form Styling */
        .settings-menu form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Form Groups */
        .form-group {
            text-align: left;
        }

        /* Labels */
        .form-group label {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        /* Input Fields */
        .settings-menu input[type="text"],
        .settings-menu input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            transition: border 0.3s ease;
        }

        /* Input Focus Effect */
        .settings-menu input[type="text"]:focus,
        .settings-menu input[type="password"]:focus {
            border-color: #ff7f50;
        }

        /* Submit Button */
        .settings-menu input[type="submit"] {
            background-color: #ff7f50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .settings-menu input[type="submit"]:hover {
            background-color: #ff6347;
        }

        /* Success Message */
        .success-message {
            background: #28a745;
            color: white;
            padding: 8px;
            margin-top: 10px;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="settings-btn" onclick="toggleSettingsMenu()">⚙ Settings</div>


    <div class="settings-menu" id="settingsMenu">
        <p>Update Admin Profile:</p>
        <form method="post">
            <div class="form-group">
                <label for="adminUsername">Username:</label>
                <input type="text" id="adminUsername" name="name" placeholder="Enter New Username" required>
            </div>
            <div class="form-group">
                <label for="adminPassword">Password:</label>
                <input type="password" id="adminPassword" name="password" placeholder="Enter New Password" required>
            </div>
            <input type="submit" name="update_profile" value="Update">
        </form>
        <?php if (isset($message)) {
            echo "<p class='success-message'>$message</p>";
        } ?>
    </div>



    <?php
    include 'connect.php'; // Ensure database connection

    // Handle form submission when "Update" button is clicked
    if (isset($_POST['update_profile'])) {
        $newUsername = $_POST['name'];
        $newPassword = $_POST['password']; // No hashing as per your request

        // Updating admin profile
        $sql = "UPDATE admin_login SET admin_name = '$newUsername', admin_password = '$newPassword' WHERE admin_name = '{$_SESSION['adminId']}'";

        if (mysqli_query($conn, $sql)) {
            $message = "Profile Updated Successfully!";
        } else {
            $message = "Update Failed. Try Again.";
        }
    }
    ?>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "./adminHeader.php";
    include "./sidebar.php";
    include_once "./config/dbconnect.php";
    ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://cdn-icons-png.flaticon.com/128/3095/3095583.png" alt="Phone Flip" style="width:70px; height:70px; margin-bottom:10px;">
                    <h4 style="color:#333;">Contact</h4>
                    <h5 style="color:#333;">
                        <?php
                        $sql = "SELECT COUNT(*) AS total_orders FROM contact_form_submissions";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['total_orders'];
                        } else {
                            echo '0';
                        }
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://cdn-icons-png.flaticon.com/128/2460/2460737.png" alt="Phone Flip" style="width:70px; height:70px; margin-bottom:10px;">
                    <h4 style="color:#333;">Total Orders</h4>
                    <h5 style="color:#333;">
                        <?php
                        $sql = "SELECT COUNT(*) AS total_orders FROM bookings";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['total_orders'];
                        } else {
                            echo '0';
                        }
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:#333;">Login User</h4>
                    <h5 style="color:#333;">
                        <?php
                        $sql = "SELECT COUNT(*) AS total_orders FROM user";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['total_orders'];
                        } else {
                            echo '0';
                        }
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://cdn-icons-png.flaticon.com/128/2731/2731956.png" alt="Phone Flip" style="width:70px; height:70px; margin-bottom:10px;">
                    <h4 style="color:#333;">Pet Adoption request</h4>
                    <h5 style="color:#333;">
                        <?php
                        $sql = "SELECT COUNT(*) AS total_adoption_request FROM adoption_requests";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['total_adoption_request'];
                        } else {
                            echo '0';
                        }
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://cdn-icons-png.flaticon.com/128/5267/5267181.png" alt="Phone Flip" style="width:70px; height:70px; margin-bottom:10px;">
                    <h4 style="color:#333;">Pet Donate request</h4>
                    <h5 style="color:#333;">
                        <?php
                        $sql = "SELECT COUNT(*) AS total_donate_request FROM pet_donations";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['total_donate_request'];
                        } else {
                            echo '0';
                        }
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <img src="https://cdn-icons-png.flaticon.com/128/3659/3659076.png" alt="Phone Flip" style="width:70px; height:70px; margin-bottom:10px;">
                    <h4 style="color:#333;">vet consult request</h4>
                    <h5 style="color:#333;">
                        <?php
                        $sql = "SELECT COUNT(*) AS total_vetconsult_request FROM consultations";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['total_vetconsult_request'];
                        } else {
                            echo '0';
                        }
                        ?>
                    </h5>
                </div>
            </div>

        </div>
    </div>


    <canvas id="activityChart"></canvas>


    <?php
    if (isset($_GET['category']) && $_GET['category'] == "success") {
        echo '<script> alert("Category Successfully Added")</script>';
    } else if (isset($_GET['category']) && $_GET['category'] == "error") {
        echo '<script> alert("Adding Unsuccessful")</script>';
    }
    if (isset($_GET['size']) && $_GET['size'] == "success") {
        echo '<script> alert("Size Successfully Added")</script>';
    } else if (isset($_GET['size']) && $_GET['size'] == "error") {
        echo '<script> alert("Adding Unsuccessful")</script>';
    }
    if (isset($_GET['variation']) && $_GET['variation'] == "success") {
        echo '<script> alert("Variation Successfully Added")</script>';
    } else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
        echo '<script> alert("Adding Unsuccessful")</script>';
    }
    ?>

    <?php
    include_once "./config/dbconnect.php";

    $data = [];
    $tables = [
        "contact_form_submissions" => "contact_requests",
        "bookings" => "total_orders",
        "user" => "login_users",
        "adoption_requests" => "adoption_requests",
        "pet_donations" => "donation_requests",
        "consultations" => "vet_consult_requests"
    ];

    // Fetch counts from the database
    foreach ($tables as $table => $key) {
        $query = "SELECT COUNT(*) AS count FROM $table";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $data[$key] = $row['count'];
    }
    ?>

    <div id="main-content" class="container allContent-section py-4">
        <h2 class="text-center">Admin Dashboard</h2>
        <canvas id="activityChart" class="mt-4"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('activityChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Orders', 'Login Users', 'Contact Requests', 'Adoption Requests', 'Donation Requests', 'Vet Consult Requests'],
                datasets: [{
                    label: 'Total Counts',
                    data: [
                        <?php echo $data['total_orders']; ?>,
                        <?php echo $data['login_users']; ?>,
                        <?php echo $data['contact_requests']; ?>,
                        <?php echo $data['adoption_requests']; ?>,
                        <?php echo $data['donation_requests']; ?>,
                        <?php echo $data['vet_consult_requests']; ?>
                    ],
                    backgroundColor: ['#4CAF50', '#2196F3', '#FF9800', '#9C27B0', '#E91E63', '#FFC107'],
                    borderColor: '#000',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        function toggleSettingsMenu() {
            var menu = document.getElementById("settingsMenu");
            if (menu.classList.contains("show")) {
                menu.classList.remove("show");
                setTimeout(() => {
                    menu.style.display = "none";
                }, 300); // Matches the animation duration
            } else {
                menu.style.display = "block";
                setTimeout(() => {
                    menu.classList.add("show");
                }, 10);
            }
        }
    </script>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>

</html>