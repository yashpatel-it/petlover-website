<?php
include 'connect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM volunteers WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
    }
}

// Handle editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $availability = mysqli_real_escape_string($conn, $_POST['availability']);
    $sql = "UPDATE volunteers SET name='$name', email='$email', phone='$phone', gender='$gender', age='$age', skills='$skills', availability='$availability' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating record: " . mysqli_error($conn) . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Table</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- css bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;

        }

        .container {
            max-width: 90%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ed6436;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .btn {
            padding: 8px 12px;
            margin: 4px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php include "./adminHeader.php"; ?>

    <center>
        <h2>Volunteer Request Data</h2>
    </center>
    <button onclick="window.history.back();"
        style="border: 3px solid orange; background: none; cursor: pointer; font-size: 20px; 
               color: #ED6436; padding: 8px 16px; border-radius: 8px; 
               transition: all 0.3s ease; font-weight: bold;">
        ⬅️Back
    </button>

    <?php

    // Check connection
    if (!$conn) {
        die("Database Connection Failed: " . mysqli_connect_error());
    }

    // Fetch data from the volunteers table
    $sql = "SELECT id, name, email, phone, gender, age, skills, availability, status FROM volunteers";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    // Display data or show 'No volunteers found'
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>PHONE</th>
    <th>GENDER</th>
    <th>AGE</th>
    <th>SKILL</th>
    <th>AVAILABILITY</th>
    <th>ADMIN STATUS</th>
    <th>ACTIONS</th>
    <th>STATUS UPDATE</th>
    </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
        <td>" . htmlspecialchars($row["id"]) . "</td>
        <td>" . htmlspecialchars($row["name"]) . "</td>
        <td>" . htmlspecialchars($row["email"]) . "</td>
        <td>" . htmlspecialchars($row["phone"]) . "</td>
        <td>" . htmlspecialchars($row["gender"]) . "</td>
        <td>" . htmlspecialchars($row["age"]) . "</td>
        <td>" . htmlspecialchars($row["skills"]) . "</td>
        <td>" . htmlspecialchars($row["availability"]) . "</td>
        <td>" . htmlspecialchars($row["status"]) . "</td>
    
        <td>
            <a class='btn btn-danger' href='volunteertable.php?delete=" . $row['id'] . "'>Delete</a> | 
            <a class='btn btn-success' href='volunteertable.php?edit=" . $row['id'] . "'>Edit</a>
        </td>

        <td>
            <a class='btn btn-success' href='volunteertable.php?status=approved&id=" . $row['id'] . "'>Approve</a>
            <a class='btn btn-danger' href='volunteertable.php?status=rejected&id=" . $row['id'] . "'>Reject</a>
        </td>
        </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: red; font-weight: bold;'>No volunteers found. Please add some data.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>


    <?php
    include 'connect.php';
    // Handle edit form display
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $sql = "SELECT * FROM volunteers WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
    ?><br><br>
            <!-- edit event form  -->
            <div class="container">
                <h2>Dog Adoption Form</h2>
                <form action="volunteertable.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <label>Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>">


                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>">

                    <label>Phone:</label>
                    <input type="tel" name="phone" value="<?php echo $row['phone']; ?>">

                    <label>Gender:</label>
                    <select name="gender" value="<?php echo $row['gender']; ?>">
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>

                    <label>Age:</label>
                    <input type="number" name="age" value="<?php echo $row['age']; ?>">


                    <label>Skills:</label>
                    <input type="text" name="skills" value="<?php echo $row['skills']; ?>">


                    <label>Availibility?</label>
                    <select name="availability" value="<?php echo $row['availability']; ?>">
                        <option value="flexible">flexible</option>
                        <option value="weekend">weekend</option>
                    </select>

                    <button type="submit" class="btnn" name="update" value="update">Update</button>
                </form>
            </div>
            <style>
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
            </style>

            <!-- edit event close  -->
    <?php
        } else {
            echo "No record found with ID $id";
        }
    }
    ?>

    <?php
    require 'connect.php';

    if (isset($_GET['status']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $status = $_GET['status']; // 'approved' or 'rejected'

        // Update status in the database
        $sql = "UPDATE volunteers SET status='$status' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Request has been $status successfully.'); window.location='volunteertable.php';</script>";
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
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