<?php
// session_start();
include_once "./config/dbconnect.php";
?>
<!-- nav -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>petlover</title>
    <style>
        .user-cart {
            position: relative;
            display: inline-block;
        }

        .user-cart .tooltip-text {
            visibility: hidden;
            width: 120px;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 5px;
            border-radius: 5px;

            position: absolute;
            z-index: 1;
            bottom: 125%;
            /* Adjust as needed */
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 14px;
        }

        .user-cart:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #ED6436;">

        <a class="navbar-brand ml-5" href="./index.php">
            <img src="./assets/images/logo.png" width="80" height="80" alt="Swiss Collection">
        </a>
        <center>
            <h2 style="color: #fff;">Pet Lover Admin panel</h2>
        </center>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

        <div class="user-cart">
            <?php
            if (isset($_SESSION['adminId'])) {
            ?>
                <span class="tooltip-text">Admin Logout</span>

                <a href="admin_logout.php" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
                </a>
            <?php
            } else {
            ?>
                <a href="admin_logout.php" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
                </a>
            <?php
            } ?>
        </div>
    </nav>


</body>

</html>