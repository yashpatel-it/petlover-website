<?php
require 'connect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM adoption_requests WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
    }
}

// Handle editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pre_adoption_check = mysqli_real_escape_string($conn, $_POST['pre_adoption_check']);
    $pet_name = mysqli_real_escape_string($conn, $_POST['pet_name']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $profession = mysqli_real_escape_string($conn, $_POST['profession']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $landlord_permission = mysqli_real_escape_string($conn, $_POST['landlord_permission']);
    $family_agreement = mysqli_real_escape_string($conn, $_POST['family_agreement']);
    $caretaker = mysqli_real_escape_string($conn, $_POST['caretaker']);
    $past_experience = mysqli_real_escape_string($conn, $_POST['past_experience']);
    $pet_location = mysqli_real_escape_string($conn, $_POST['pet_location']);
    $alone_hours = mysqli_real_escape_string($conn, $_POST['alone_hours']);
    $diet = mysqli_real_escape_string($conn, $_POST['diet']);
    $house_check = mysqli_real_escape_string($conn, $_POST['house_check']);
    $referral = mysqli_real_escape_string($conn, $_POST['referral']);
    $additional_notes = mysqli_real_escape_string($conn, $_POST['additional_notes']);
    $sql = "UPDATE adoption_requests SET email='$email', pre_adoption_check='$pre_adoption_check', pet_name='$pet_name', full_name='$full_name', age='$age', profession='$profession', phone='$phone', area='$area', landlord_permission='$landlord_permission', family_agreement='$family_agreement', caretaker='$caretaker', past_experience='$past_experience', pet_location='$pet_location', alone_hours='$alone_hours', diet='$diet', house_check='$house_check', referral='$referral', additional_notes='$additional_notes' WHERE id=$id";

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
    <script>
        function toggleInput(id, selectId) {
            var select = document.getElementById(selectId);
            var input = document.getElementById(id);
            input.style.display = (select.value === "Other") ? "block" : "none";
        }
    </script>
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

    // Fetch all adoption requests
    $query = "SELECT * FROM adoption_requests";
    $result1 = mysqli_query($conn, $query);

    // Fetch and display data from the database
    $sql = "SELECT id,email, pre_adoption_check, pet_name, full_name, age, profession, phone, area, residence, landlord_permission, 
            family_agreement, caretaker, past_experience, pet_location, adoption_reason, alone_hours, diet, house_check, referral, additional_notes, status FROM adoption_requests";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
    <tr>
    <th>ID</th>
    <th>EMAIL</th>
    <th>PRE_ADOPTION_CHECK</th>
    <th>PET_NAME</th>
    <th>FULL_NAME</th>
    <th>AGE</th>
    <th>PROFFESION</th>
    <th>PHONE</th>
    <th>AREA</th>
    <th>RESIDENCE</th>
    <th>LANDLORD_PERMISSION</th>
    <th>FAMILY_AGREEMENT</th>
    <th>CARETAKER</th>
    <th>PAST_EXPERIENCE</th>
    <th>PET_LOCATION</th>
    <th>ADOPT_REASON</th>
    <th>ALONE_HOURS</th>
    <th>DIET</th>
    <th>HOUSECHECK</th>
    <th>REFERRAL</th>
    <th>ADDITIONAL_NOTE</th>
    <th>REQUEST STATUS</th>
    <th>ACTION</th>
    <th>ACTION ADMIN</th>

    </tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["pre_adoption_check"] . "</td>
        <td>" . $row["pet_name"] . "</td>
        <td>" . $row["full_name"] . "</td>
        <td>" . $row["age"] . "</td>
        <td>" . $row["profession"] . "</td>
        <td>" . $row["phone"] . "</td>
        <td>" . $row["area"] . "</td>
        <td>" . $row["residence"] . "</td>
        <td>" . $row["landlord_permission"] . "</td>
        <td>" . $row["family_agreement"] . "</td>
        <td>" . $row["caretaker"] . "</td>
        <td>" . $row["past_experience"] . "</td>
        <td>" . $row["pet_location"] . "</td>
        <td>" . $row["adoption_reason"] . "</td>
        <td>" . $row["alone_hours"] . "</td>
        <td>" . $row["diet"] . "</td>
        <td>" . $row["house_check"] . "</td>
        <td>" . $row["referral"] . "</td>
        <td>" . $row["additional_notes"] . "</td>
        <td>" . $row["status"] . "</td>
        <td>
            <a class='btn btn-danger' href='adoptreqtable.php?delete=" . $row['id'] . "'>Delete</a> | 
            <a class='btn btn-success' href='adoptreqtable.php?edit=" . $row['id'] . "'>Edit</a>
        </td>

        <td>
            <a class='btn btn-success' href='adoptreqtable.php?status=approved&id=" . $row['id'] . "'>Approve</a>
            <a class='btn btn-danger' href='adoptreqtable.php?status=rejected&id=" . $row['id'] . "'>Reject</a>
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
        $sql = "SELECT * FROM adoption_requests WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
    ?><br><br>
            <!-- edit event form  -->
            <div class="container">
                <h2>Dog Adoption Form</h2>
                <form action="adoptreqtable.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>">

                    <label>Do you agree to a pre-adoption house check?</label>
                    <select name="pre_adoption_check" value="<?php echo $row['pre_adoption_check']; ?>">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                    <label>Name of the pet you would like to adopt:</label>
                    <input type="text" name="pet_name" value="<?php echo $row['pet_name']; ?>">

                    <label>Your Full Name:</label>
                    <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>">

                    <label>Age:</label>
                    <input type="number" name="age" value="<?php echo $row['age']; ?>">

                    <label>Your current profession? </label>
                    <select id="profession" name="profession" onchange="toggleInput('otherProfession', 'profession')" value="<?php echo $row['profession']; ?>">
                        <option value="Employee">Employee</option>
                        <option value="Student">Student</option>
                        <option value="Other">Other</option>
                    </select>
                    <!-- <input type="text" id="otherProfession" name="other_profession" class="hidden" placeholder="Please specify" value="<?php echo $row['profession']; ?>"> -->

                    <label>Phone Number:</label>
                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>">

                    <label>Which area in Surat do you live in?</label>
                    <input type="text" name="area" value="<?php echo $row['area']; ?>">

                    <label>Do you stay in an apartment or an individual house?</label>
                    <select id="residence" name="residence" onchange="toggleInput('otherResidence', 'residence')" value="<?php echo $row['residence']; ?>">
                        <option value="Apartment">Apartment</option>
                        <option value="Individual House">Individual House</option>
                        <option value="Other">Other</option>
                    </select>
                    <!-- <input type="text" id="otherResidence" name="other_residence" class="hidden" placeholder="Please specify" value="<?php echo $row['residence']; ?>"> -->

                    <label>Do you have landlord's permission to have a pet?</label>
                    <select name="landlord_permission" value="<?php echo $row['landlord_permission']; ?>">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Yet to ask">Yet to ask</option>
                    </select>

                    <label>Has every family member agreed to adopt a pet?</label>
                    <select name="family_agreement" placeholder="please select" value="<?php echo $row['family_agreement']; ?>">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Yet to ask">Yet to ask</option>
                    </select>

                    <label>Who will be the primary caretaker for the pet?</label>
                    <input type="text" name="caretaker" value="<?php echo $row['caretaker']; ?>">

                    <label>Have you ever raised a pet?</label>
                    <select name="past_experience" value="<?php echo $row['past_experience']; ?>">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                    <label>Where will the dog be kept during the day and night?</label>
                    <select name="pet_location" value="<?php echo $row['pet_location']; ?>">
                        <option value="Indoors">Indoors</option>
                        <option value="Indoors/Outdoors">Indoors/Outdoors</option>
                        <option value="Strictly Outdoors">Strictly Outdoors</option>
                    </select>

                    <label>Reason for adopting a pet now?</label>
                    <select id="reason" name="adoption_reason" onchange="toggleInput('otherReason', 'reason')" value="<?php echo $row['adoption_reason']; ?>">
                        <option value="Companion">Companion</option>
                        <option value="Guarding Purpose">Guarding Purpose</option>
                        <option value="Other">Other</option>
                    </select>
                    <!-- <input type="text" id="reason" name="other_reason" class="hidden" placeholder="Please specify" value="<?php echo $row['adoption_reason']; ?>"> -->

                    <label>Will the pet be left alone? If yes, for how many hours?</label>
                    <input type="number" name="alone_hours" value="<?php echo $row['alone_hours']; ?>">

                    <label>Diet plan for the pet?</label>
                    <select name="diet" value="<?php echo $row['diet']; ?>">
                        <option value="Packaged Food">Packaged Food</option>
                        <option value="Non-Veg Daily">Non-Veg Daily</option>
                        <option value="Vegetarian">Vegetarian</option>
                    </select>

                    <label>If required, do you agree to a house check?</label>
                    <select name="house_check" value="<?php echo $row['house_check']; ?>">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                    <label>Where did you hear about us?</label>
                    <select name="referral" value="<?php echo $row['referral']; ?>">
                        <option value="Website">Website</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Friend">Friend</option>
                    </select>

                    <label>Anything else you wish to add?</label>
                    <textarea name="additional_notes" rows="4" value="<?php echo $row['additional_notes']; ?>"></textarea>

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
        $sql = "UPDATE adoption_requests SET status='$status' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Request has been $status successfully.'); window.location='adoptreqtable.php';</script>";
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