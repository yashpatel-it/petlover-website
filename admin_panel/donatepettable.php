<?php
// Include database connection
include "./adminHeader.php";
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $pet_name = $_POST['pet_name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $vaccination = $_POST['vaccination'];
    $special_needs = $_POST['special_needs'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $user_name = $_POST['user_name'];
    $user_mobile = $_POST['user_mobile'];
    $user_email = $_POST['user_email'];
    $donation_date = date("Y-m-d");

    // File Upload Handling
    $image = $_FILES["image"]["name"];
    $tempName = $_FILES["image"]["tmp_name"];

    if (!empty($image)) {
        $imageExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowedExt)) {
            $imageName = time() . '_' . uniqid() . '.' . $imageExt;
            $targetDirectory = "upload/" . $imageName;
            move_uploaded_file($tempName, $targetDirectory);
        } else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
            exit;
        }
    } else {
        $targetDirectory = "";
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssissssssssss",
        $pet_name,
        $breed,
        $age,
        $gender,
        $vaccination,
        $special_needs,
        $description,
        $location,
        $targetDirectory,
        $user_name,
        $user_mobile,
        $user_email,
        $donation_date
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Thank you for donating your pet. We will contact you soon.');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// Fetch pet donations
$query = "SELECT * FROM pet_donations ORDER BY id ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM pet_donations WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
    }
}

// Handle editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $pet_name = mysqli_real_escape_string($conn, $_POST['pet_name']);
    $breed = mysqli_real_escape_string($conn, $_POST['breed']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $vaccination = mysqli_real_escape_string($conn, $_POST['vaccination']);
    $special_needs = mysqli_real_escape_string($conn, $_POST['special_needs']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_mobile = mysqli_real_escape_string($conn, $_POST['user_mobile']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);

    $donation_date = mysqli_real_escape_string($conn, $_POST['donation_date']);
    // File Upload Handling
    $image = $_FILES["image"]["name"];
    $tempName = $_FILES["image"]["tmp_name"];

    if (!empty($image)) {
        $imageExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowedExt)) {
            $imageName = time() . '_' . uniqid() . '.' . $imageExt;
            $targetDirectory = "upload/" . $imageName;
            move_uploaded_file($tempName, $targetDirectory);
        } else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
            exit;
        }
    } else {
        $targetDirectory = "";
    }
    $sql = "UPDATE pet_donations SET pet_name='$pet_name', breed='$breed', age='$age', gender='$gender', vaccination='$vaccination', special_needs='$special_needs', description='$description', location='$location', image_path='$targetDirectory', user_name='$user_name', user_mobile='$user_mobile', user_email='$user_email', donation_date='$donation_date' WHERE id=$id";

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
    <title>Pet Donations</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
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
    </style>
</head>

<body>


    <button onclick="window.history.back();"
        style="border: 3px solid orange; background: none; cursor: pointer; font-size: 20px; 
               color: #ED6436; padding: 8px 16px; border-radius: 8px; 
               transition: all 0.3s ease; font-weight: bold;">
        ⬅️Back
    </button>

    <center>
        <h2>Pet Donations List</h2>
    </center>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Pet Name</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Vaccination</th>
                <th>Special Needs</th>
                <th>Description</th>
                <th>Location</th>
                <th>Image</th>
                <th>Owner</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Date</th>
                <th>Request Status</th>
                <th>ACTION</th>
                <th>ADMIN ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['pet_name']; ?></td>
                    <td><?php echo $row['breed']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['vaccination']; ?></td>
                    <td><?php echo $row['special_needs']; ?></td>a
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><img src="http://localhost/petlover/<?php echo $row['image_path']; ?>" class="card-img-top" alt="Pet Image" style="height: 100px; object-fit: cover;">
                    </td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_mobile']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <td><?php echo $row['donation_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a class='btn btn-danger' href='donatepettable.php?delete=<?php echo $row["id"]; ?>'>Delete</a><br><br>
                        <a class='btn btn-success' href='donatepettable.php?edit=<?php echo $row["id"]; ?>'>Delete</a><br><br>
                    </td>


                    <td>
                        <a class='btn btn-success' href='donatepettable.php?status=approved&id=<?php echo $row['id']; ?>'>Approve</a><br><br>
                        <a class='btn btn-danger' href='donatepettable.php?status=rejected&id=<?php echo $row['id']; ?>'>Reject</a>
                    </td>
                    <?php
                    // Handle edit form display
                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $sql = "SELECT * FROM pet_donations WHERE id=$id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if ($row) {
                    ?><br><br>
                            <!-- edit event form  -->
                            <div class="container">
                                <h2>Pet Donate updation Form</h2>
                                <form action="donatepettable.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                    <label>Pet Name:</label>
                                    <input type="text" name="pet_name" placeholder="Enter Pet Name" value="<?php echo $row['pet_name']; ?>">

                                    <div class="form-group">
                                        <label>Breed:</label>
                                        <input type="text" name="breed" placeholder="Enter Pet Breed" value="<?php echo $row['breed']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Age:</label>
                                        <input type="number" name="age" min="0" max="20" placeholder="Enter Pet Age" value="<?php echo $row['age']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender:</label>
                                        <select name="gender" value="<?php echo $row['gender']; ?>">
                                            <option value="" disabled selected>Select a category</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Vaccination Status:</label>
                                        <select name="vaccination" value="<?php echo $row['vaccination']; ?>">
                                            <option value="" disabled selected>Select a category</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Special Needs:</label>
                                        <input type="text" name="special_needs" placeholder="Enter Your Need" value="<?php echo $row['special_needs']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea name="description" rows="3" placeholder="Enter Your Description" value="<?php echo $row['description']; ?>"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Location:</label>
                                        <input type="text" name="location" placeholder="Enter Your Correct Address" value="<?php echo $row['location']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Your Name:</label>
                                        <input type="text" name="user_name" placeholder="Enter Your Name" value="<?php echo $row['user_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number:</label>
                                        <input type="text" name="user_mobile" pattern="[0-9]{10}" placeholder="Enter Your Mobile Number" value="<?php echo $row['user_mobile']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address:</label>
                                        <input type="email" name="user_email" placeholder="Enter your Email" value="<?php echo $row['user_email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Pet Images:</label>
                                        <input type="file" name="image" id="image-input" accept="image/*" multiple placeholder="Upload Your Pet Pic" value="<?php echo $row['image_path']; ?>">
                                        <div id="image-preview"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" required> I agree to the terms and conditions
                                        </label>
                                    </div>

                                    <input type="submit" class="btnn" name="update" value="update">
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>


</html>

<?php
require 'connect.php';

if (isset($_GET['status']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status']; // 'approved' or 'rejected'

    // Update status in the database
    $sql = "UPDATE pet_donations SET status='$status' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Request has been $status successfully.'); window.location='donatepettable.php';</script>";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>