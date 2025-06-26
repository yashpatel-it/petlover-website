<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'connect.php'; // Make sure this file contains the database connection code

// Handle form submission for new records
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitt'])) {
    // Retrieve and sanitize form input
    $full_name = mysqli_real_escape_string($conn, $_POST['Namee']);
    $email = mysqli_real_escape_string($conn, $_POST['Emaill']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['Passwordd']);

    // SQL query to insert new record
    $sql = "INSERT INTO user (ID, FULLNAME, EMAIL, PASSWORD) VALUES ( NULL, '$full_name', '$email', '$phone_number')";

    // Output the query for debugging
    echo "SQL Query: " . $sql . "<br>";

    // Execute query and check for success
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully<br>";
    } else {
        echo "Error creating record: " . mysqli_error($conn) . "<br>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
    <div class="col-lg-6 m-auto">
        <form method="post" action="newuser.php">
            <br><br>
            <div class="card">
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center"> Create New Member </h1>
                </div><br>
                <label> NAME: </label>
                <input type="text" name="Namee" class="form-control" required> <br>
                <label> EMAIL: </label>
                <input type="email" name="Emaill" class="form-control" required> <br>
                <label> PASSWORD: </label>
                <input type="password" name="Passwordd" class="form-control" required> <br>
                <button class="btn btn-success" type="submit" name="submitt"> Submit </button><br>
                <a class="btn btn-info" href="usertable.php"> Cancel </a><br>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>