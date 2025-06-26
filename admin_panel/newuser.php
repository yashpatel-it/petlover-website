<?php
require 'connect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM user WHERE ID=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
    }
}

// Handle editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $id = $_POST['ID'];
    $full_name = mysqli_real_escape_string($conn, $_POST['Namee']);
    $email = mysqli_real_escape_string($conn, $_POST['Emaill']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['Passwordd']);

    $sql = "UPDATE user SET FULLNAME='$full_name', EMAIL='$email', PASSOWRD='$phone_number' WHERE ID=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating record: " . mysqli_error($conn) . "<br>";
    }
}

// Handle form submission for new records
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['Namee']);
    $email = mysqli_real_escape_string($conn, $_POST['Emaill']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['Passwordd']);

    $sql = "INSERT INTO user (FULLNAME, EMAIL, PASSWORD) VALUES ('$full_name', '$email', '$phone_number')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully<br>";
    } else {
        echo "Error creating record: " . mysqli_error($conn) . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        /* General Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Table Borders */
        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        /* Header Styling */
        th {
            background-color: #333;
            /* Light Blue Background */
            color: #fff;
            /* White Text */
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }

        /* Row Styling */
        tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Alternating Row Color */
        }

        tr:hover {
            background-color: #e9ecef;
            /* Hover Effect */
        }

        /* Cell Styling */
        td {
            padding: 12px;
            text-align: left;
        }

        /* Actions Buttons */
        .btn {
            border: none;
            color: #fff;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 0 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-danger {
            background-color: #dc3545;
            /* Red */
        }

        .btn-danger:hover {
            background-color: #c82333;
            /* Darker Red */
        }

        .btn-success {
            background-color: #28a745;
            /* Green */
        }

        .btn-success:hover {
            background-color: #218838;
            /* Darker Green */
        }
        h2{
            margin: 5px;
        }
    </style>
</head>

<body>

    <!-- nav -->
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">

        <a class="navbar-brand ml-5" href="./index.php">
            <img src="./assets/images/logo.png" width="80" height="80" alt="Swiss Collection">
        </a>
        <center>
            <h2 style="color: #fff;">Event Elegance Admin panel</h2>
        </center>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

        <div class="user-cart">
            <?php
            if (isset($_SESSION['user_id'])) {
            ?>
                <a href="" style="text-decoration:none;">
                    <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
                </a>
            <?php
            } else {
            ?>
                <a href="" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
                </a>
            <?php
            } ?>
        </div>
    </nav>


    <center><h2>User Data</h2><br></center>
    <a href="adduser1.php" style="background-color: #333; color:#ddd; padding:10px; margin:10px; border-radius:10px; text-decoration:none;">Add User</a>
    <?php
    // Fetch and display data from the database
    $sql = "SELECT ID, FULLNAME, EMAIL, PASSWORD FROM user";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
    <tr>
    <th>ID</th>
    <th>FULLNAME</th>
    <th>EMAIL</th>
    <th>PASSWORD</th>
    <th>Actions</th>
    </tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
        <td>" . $row["ID"] . "</td>
        <td>" . $row["FULLNAME"] . "</td>
        <td>" . $row["EMAIL"] . "</td>
        <td>" . $row["PASSWORD"] . "</td>
        <td>
            <a class='btn btn-danger' href='newuser.php?delete=" . $row['ID'] . "'>Delete</a> | 
            <a class='btn btn-success' href='newuser.php?edit=" . $row['ID'] . "'>Edit</a>
        </td>
        </tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }
    ?>

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

</body>

</html>

<?php
// Close connection
mysqli_close($conn);
?>