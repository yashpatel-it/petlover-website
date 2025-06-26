<?php

require 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
            color: white;
        }

        .notification-badge {
            position: relative;
            background: red;
            color: white;
            padding: 5px 8px;
            border-radius: 50%;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="mySidebar">
        <div class="side-header">
            <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection">
            <h5 style="margin-top:10px;">Hello, Admin</h5>
        </div>

        <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="./index.php"><i class="fa fa-home"></i> Dashboard</a>
        <a href="logintable.php"><i class="fa fa-users"></i> Login User
        </a>
        <a href="contdatatable.php"><i class="fa-solid fa-comments"></i> Contact
        </a>
        <a href="table.php"><i class="fa-solid fa-calendar-days"></i> Orders
        </a>
        <a href="user_profile.php"><i class="fa-solid fa-user"></i> User Profile</a>
        <a href="adoptreqtable.php"><i class="fa-solid fa-hands-holding-circle"></i> Adoption Request
        </a>
        <a href="donatepettable.php"><i class="fa fa-list"></i> Donate Request
        </a>
        <a href="consulttable.php"><i class="fa-solid fa-user-doctor"></i> Consult Request
        </a>
        <a href="volunteertable.php"><i class="fa fa-users"></i> Volunteers


            <!-- Feedback with Notification Badge -->
            <a href="feedbacktable.php"><i class="fa-solid fa-comments"></i> User Feedbacks

            </a>
            <a href="analytics.php">User Analytics</a>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>