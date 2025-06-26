<?php
require 'connect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM consultations WHERE id=$id";
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
    $consultation_date = mysqli_real_escape_string($conn, $_POST['consultation_date']);
    $time_slot = mysqli_real_escape_string($conn, $_POST['time_slot']);
    $pet_type = mysqli_real_escape_string($conn, $_POST['pet_type']);
    $pet_gender = mysqli_real_escape_string($conn, $_POST['pet_gender']);
    $pet_age = mysqli_real_escape_string($conn, $_POST['pet_age']);
    $pet_weight = mysqli_real_escape_string($conn, $_POST['pet_weight']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $issue = mysqli_real_escape_string($conn, $_POST['issue']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
    $sql = "UPDATE consultations SET name='$name', email='$email', consultation_date='$consultation_date', time_slot='$time_slot', pet_type='$pet_type', pet_gender='$pet_gender', pet_age='$pet_age', pet_weight='$pet_weight', language='$language', address='$address', issue='$issue', whatsapp='$whatsapp' WHERE id=$id";

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
    <title>CONSULT TABLE</title>

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
        /* General Page Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }


        /* Page Heading */
        h2 {
            text-align: center;
            color: #ed6436;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #ed6436;
            color: white;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: rgba(237, 100, 54, 0.2);
            transition: 0.3s;
        }

        /* Image Styling */
        td img {
            height: 80px;
            width: 80px;
            border-radius: 8px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        td img:hover {
            transform: scale(1.1);
        }

        /* Action Buttons */
        .btn {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .btn-success:hover {
            background: #218838;
        }

        /* Edit Form Container */
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

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Submit Button */
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
            transition: background 0.3s;
        }

        .btnn:hover {
            background: #d9532e;
        }

        /* Container styling */
        .container {
            width: 60%;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        /* Description section */
        .description {
            width: 100%;
            margin-bottom: 20px;
            text-align: justify;
        }

        .description h2 {
            color: #013f73;
            font-size: 26px;
            text-align: center;
        }

        .description p {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        /* Form styling */
        .form-container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #013f73;
            font-size: 24px;
            text-align: center;
        }

        /* Labels */
        label {
            font-weight: bold;
            display: block;
            margin: 12px 0 5px;
            font-size: 14px;
            color: #013f73;
            text-align: justify;
        }

        /* Inputs, Select, and Textarea */
        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s ease-in-out;
            background: #fff;
        }

        /* Focus effect */
        input:focus,
        select:focus,
        textarea:focus {
            border-color: #013f73;
            box-shadow: 0px 0px 5px rgba(1, 63, 115, 0.5);
            outline: none;
        }

        /* Submit Button */
        .bk {
            width: 100%;
            padding: 12px;
            background: #013f73;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
        }

        .bk:hover {
            background: #02569b;
            box-shadow: 0px 4px 8px rgba(2, 86, 155, 0.3);
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            .form-container {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <?php include "./adminHeader.php"; ?>

    <center>
        <h2>Consult Request Data</h2>
    </center>
    <button onclick="window.history.back();"
        style="border: 3px solid orange; background: none; cursor: pointer; font-size: 20px; 
               color: #ED6436; padding: 8px 16px; border-radius: 8px; 
               transition: all 0.3s ease; font-weight: bold;">
        ⬅️Back
    </button>

    <?php

    // Fetch all adoption requests
    $query = "SELECT * FROM consultations";
    $result1 = mysqli_query($conn, $query);

    // Fetch and display data from the database
    $sql = "SELECT id,name,email,consultation_date,time_slot,pet_type,pet_gender,pet_age,pet_weight,language,address,issue,whatsapp FROM consultations";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>CONSULT_DATE</th>
    <th>TIME_SLOT</th>
    <th>PET_TYPE</th>
    <th>PET_GENDER</th>
    <th>PET_AGE</th>
    <th>PET_WEIGHT</th>
    <th>LANGUAGE</th>
    <th>ADDRESS</th>
    <th>ISSUE</th>
    <th>WHATSAPP_NO</th>
    <th>ACTION</th>

    </tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["consultation_date"] . "</td>
        <td>" . $row["time_slot"] . "</td>
        <td>" . $row["pet_type"] . "</td>
        <td>" . $row["pet_gender"] . "</td>
        <td>" . $row["pet_age"] . "</td>
        <td>" . $row["pet_weight"] . "</td>
        <td>" . $row["language"] . "</td>
        <td>" . $row["address"] . "</td>
        <td>" . $row["issue"] . "</td>
        <td>" . $row["whatsapp"] . "</td>
        <td>
            <a class='btn btn-danger' href='consulttable.php?delete=" . $row['id'] . "'>Delete</a> | 
            <a class='btn btn-success' href='consulttable.php?edit=" . $row['id'] . "'>Edit</a>
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
        $sql = "SELECT * FROM consultations WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
    ?><br><br>
            <div class="form-container">
                <h2>Book Your Vet Consultation</h2>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">


                    <label>Your Name</label>
                    <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $row['name']; ?>" required>

                    <label>Your Email</label>
                    <input type="email" name="email" placeholder="Enter Your Email Address" value="<?php echo $row['email']; ?>" required>

                    <label>Pick a Date</label>
                    <input type="date" name="consultation_date" placeholder="Select a date" min="<?= date('Y-m-d'); ?>" value="<?php echo $row['consultation_date']; ?>" required>


                    <label>Available Time Slots</label>
                    <select name="time_slot" value="<?php echo $row['time_slot']; ?>" required>
                        <option value="" disabled selected>Select a Time</option>
                        <option value="10:00 AM - 10:30 AM">10:00 AM - 10:30 AM</option>
                        <option value="10:30 AM - 11:00 AM">10:30 AM - 11:00 AM</option>
                        <option value="11:00 AM - 11:30 AM">11:00 AM - 11:30 AM</option>
                    </select>

                    <label>Select your Pet</label>
                    <select name="pet_type" value="<?php echo $row['pet_type']; ?>" required>
                        <option value="" disabled selected>Select a category</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                    </select>

                    <label>Pet's Gender</label>
                    <select name="pet_gender" value="<?php echo $row['pet_gender']; ?>" required>
                        <option value="" disabled selected>Select a category</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                    <label>Pet's Age</label>
                    <input type="number" name="pet_age" placeholder="Enter Your Pet age" value="<?php echo $row['pet_age']; ?>" required>

                    <label>Pet's Weight</label>
                    <input type="number" name="pet_weight" placeholder="Enter Your Pet Weight" value="<?php echo $row['pet_weight']; ?>" required>

                    <label>Consultation Language</label>
                    <select name="language" value="<?php echo $row['language']; ?>" required>
                        <option value="" disabled selected>Select a Language for Consult</option>
                        <option value="English">English</option>
                        <option value="Hindi">Hindi</option>
                    </select>

                    <label>Your Address</label>
                    <input type="text" name="address" placeholder="Enter Your Permanent Address" value="<?php echo $row['address']; ?>" required>

                    <label>Describe your Pet's Issue</label>
                    <textarea name="issue" placeholder="Enter Your Pet Issue" value="<?php echo $row['issue']; ?>" required></textarea>

                    <label>Your WhatsApp Number</label>
                    <input type="text" name="whatsapp" placeholder="Enter Your Mobile Number" value="<?php echo $row['whatsapp']; ?>" required>


                    <button class="bk" type="submit" name="update" value="update">update</button>
                </form>
            </div>

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