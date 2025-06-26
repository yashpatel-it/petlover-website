<?php
require 'connect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "UPDATE user SET status='deleted' WHERE ID=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
    }
}

// Handle editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updatee'])) {
    $id = $_POST['id'];
    $emaill = mysqli_real_escape_string($conn, $_POST['em']);
    $passw = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "UPDATE user SET EMAIL='$emaill', PASSWORD='$passw' WHERE ID=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating record: " . mysqli_error($conn) . "<br>";
    }
}
?>
<?php
require 'connect.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Soft delete the user by updating status
    $sql = "UPDATE user SET status='deleted' WHERE EMAIL='$email'";

    if (mysqli_query($conn, $sql)) {
        echo "User account marked as deleted.<br>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn) . "<br>";
    }
}

// Handle changing the user status
if (isset($_GET['change_status']) && isset($_GET['status'])) {
    $id = $_GET['change_status'];
    $status = $_GET['status']; // 'active', 'inactive', etc.

    // Update the user status
    $sql = "UPDATE user SET status='$status' WHERE ID=$id";

    if (mysqli_query($conn, $sql)) {
        echo "User status updated to '$status' successfully.<br>";
    } else {
        echo "Error updating status: " . mysqli_error($conn) . "<br>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Table</title>

    </script> <!-- Favicon -->
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

        .user-cart:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <?php
    include "../../petlover/admin_panel/adminHeader.php";
    ?>




    <center>
        <h2>Login User Data</h2>
    </center>
    <button onclick="window.history.back();"
        style="border: 3px solid orange; background: none; cursor: pointer; font-size: 20px; 
               color: #ED6436; padding: 8px 16px; border-radius: 8px; 
               transition: all 0.3s ease; font-weight: bold;">
        ⬅️Back
    </button>

    <?php
    // Fetch and display data from the database
    $sql = "SELECT ID, EMAIL, PASSWORD, status FROM user";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
    <tr>
    <th>ID</th>
    <th>EMAIL</th>
    <th>PASSWORD</th>
    <th>ACTION</th>
    <th>STATUS</th>

    </tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
        <td>" . $row["ID"] . "</td>
        <td>" . $row["EMAIL"] . "</td>
        <td>" . $row["PASSWORD"] . "</td>
        <td>
            <a class='btn btn-danger' href='logintable.php?delete=" . $row['ID'] . "'>Delete</a> | 
            <a class='btn btn-success' href='logintable.php?edit=" . $row['ID'] . "'>Edit</a>
        </td>
        <td>" . $row["status"] . "</td>

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
        $sql = "SELECT * FROM user WHERE ID=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
    ?><br><br>
            <!-- edit event form  -->
            <div class="container">
                <div class="title">Edit Event</div>
                <form method="POST" action="logintable.php">
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

                    <div class="input-box">
                        <label for="full_name">Email </label>
                        <input type="text" name="em" value="<?php echo $row['EMAIL']; ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="username">Password:</label>
                        <input type="text" name="pass" value="<?php echo $row['PASSWORD']; ?>" required>
                    </div>

                    <div class="button">
                        <a class="btn btn-warning" href="logintable.php?change_status=<?php echo $row['ID']; ?>&status=active">Activate</a> |
                        <a class="btn btn-warning" href="logintable.php?change_status=<?php echo $row['ID']; ?>&status=inactive">Deactivate</a>
                    </div>

                    <div class="button">
                        <input type="submit" name="updatee" value="Update">
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