<?php
require 'connect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM bookings WHERE id=$id";
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
    $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);

    $reservation_date = mysqli_real_escape_string($conn, $_POST['reservation_date']);
    $reservation_time = mysqli_real_escape_string($conn, $_POST['reservation_time']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);

    $sql = "UPDATE bookings SET name='$name', email='$email', phoneno='$phoneno', reservation_date='$reservation_date', reservation_time='$reservation_time', service='$service', duration='$duration', created_at='$created_at' WHERE id=$id";

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
        <h2>Normal Service Booking Data</h2>
    </center>
    <button onclick="window.history.back();"
        style="border: 3px solid orange; background: none; cursor: pointer; font-size: 20px; 
               color: #ED6436; padding: 8px 16px; border-radius: 8px; 
               transition: all 0.3s ease; font-weight: bold;">
        ⬅️Back
    </button>

    <?php
    // Fetch and display data from the database
    $sql = "SELECT id, name, email, phoneno, reservation_date, reservation_time, service, duration, created_at FROM bookings";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>PHONENO</th>
    <th>RESERVATION DATE</th>
    <th>RESERVATION TIME</th>
    <th>SERVICE</th>
    <th>DURATON</th>
    <th>CREATED_AT</th>
    <th>ACTION</th>
    </tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["phoneno"] . "</td>
        <td>" . $row["reservation_date"] . "</td>
        <td>" . $row["reservation_time"] . "</td>
        <td>" . $row["service"] . "</td>
        <td>" . $row["duration"] . "</td>
        <td>" . $row["created_at"] . "</td>

        <td>
            <a class='btn btn-danger' href='table.php?delete=" . $row['id'] . "'>Delete</a> | 
            <a class='btn btn-success' href='table.php?edit=" . $row['id'] . "'>Edit</a>
        </td>
        </tr>";
        }
        echo "</table>";
    } else {
        echo "No events found.";
    }
    ?>

    <?php
    // Handle edit form display
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $sql = "SELECT * FROM bookings WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
    ?><br><br>
            <!-- edit event form  -->
            <div class="container">
                <div class="title">Edit Event</div>
                <form method="POST" action="table.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="input-box">
                        <label for="name">name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="email">email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="email">phone:</label>
                        <input type="text" id="phoneno" name="phoneno" value="<?php echo $row['phoneno']; ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="reservation_date">reservation date:</label>
                        <input type="date" id="reservation_date" name="reservation_date" value="<?php echo $row['reservation_date']; ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="reservation_time">reservation time:</label>
                        <select name="reservation_time" class="custom-select border-2 px-4" style="height: 47px;" required>
                            <option value="" selected>Select A Time</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="service">service:</label>
                        <select name="service" class="custom-select border-2 px-4" style="height: 47px;" required>
                            <option value="" selected>Select A Service</option>
                            <option value="Basic">Basic</option>
                            <option value="Standard">Standard</option>
                            <option value="Premium">Premium</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="duration">duration:</label>
                        <select name="duration" class="custom-select border-2 px-4" style="height: 47px;" required>
                            <option value="" selected>Service duration</option>
                            <option value="weekly">weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="created_at">created_at:</label>
                        <input type="text" id="created_at" name="created_at" value="<?php echo $row['created_at']; ?>" required>
                    </div>
                    <div class="button">
                        <input type="submit" name="update" value="Update">
                    </div>
                </form>
            </div>
            <style>
                .container {
                    background: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    max-width: 600px;
                    width: 100%;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border: 1px solid #ddd;
                    margin: 0 auto;
                }

                .container .title {
                    font-size: 28px;
                    font-weight: 600;
                    margin-bottom: 20px;
                    color: #333;
                }

                form {
                    display: flex;
                    flex-direction: column;
                }

                form .input-box {
                    margin-bottom: 15px;
                }

                form .input-box label {
                    font-weight: 500;
                    display: block;
                    margin-bottom: 5px;
                    color: #333;
                }

                form .input-box input {
                    width: 100%;
                    padding: 10px;
                    border-radius: 5px;
                    border: 1px solid #ccc;
                    box-sizing: border-box;
                    font-size: 16px;
                }

                form .input-box input:focus {
                    border-color: #9b59b6;
                    outline: none;
                }

                form .button {
                    margin-top: 20px;
                    display: flex;
                    justify-content: center;
                }

                form .button input {
                    background: linear-gradient(135deg, #71b7e6, #9b59b6);
                    border: none;
                    color: #fff;
                    font-size: 18px;
                    font-weight: 500;
                    padding: 10px 20px;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background 0.3s ease;
                }

                form .button input:hover {
                    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
                }
            </style>

            <!-- edit event close  -->
    <?php
        } else {
            echo "No record found with ID $id";
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