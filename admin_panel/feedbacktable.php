<?php
require 'connect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM feedbacktbl WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
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
            border: 1px solid #333;
        }

        /* Header Styling */
        th {
            background-color: #ED6436;
            color: #fff;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }

        /* Row Styling */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9ecef;
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
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <?php include "./adminHeader.php"; ?>

    <center>
        <h2>Event Data</h2>
    </center>
    <button onclick="window.history.back();"
        style="border: 3px solid orange; background: none; cursor: pointer; font-size: 20px; 
               color: #ED6436; padding: 8px 16px; border-radius: 8px; 
               transition: all 0.3s ease; font-weight: bold;">
        ⬅️Back
    </button>

    <?php
    // Fetch and display data from the database
    $sql = "SELECT id, NAME, EMAIL, RATING, MESSAGE  FROM feedbacktbl";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>RATING</th>
    <th>MESSAGE</th>
    <th>ACTION</th>
    </tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["NAME"] . "</td>
        <td>" . $row["EMAIL"] . "</td>
        <td>" . $row["RATING"] . "</td>
        <td>" . $row["MESSAGE"] . "</td>
        <td>
            <a class='btn btn-danger' href='feedbacktable.php?delete=" . $row['id'] . "'>Delete</a>
        </td>

        </tr>";
        }
        echo "</table>";
    } else {
        echo "No events found.";
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