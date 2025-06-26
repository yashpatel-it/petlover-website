<?php
require 'connect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM contact_form_submissions WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sqlstt = "UPDATE feedbacktbl SET status='deleted' WHERE id=$id";
    if (mysqli_query($conn, $sqlstt)) {
        echo "Record marked as deleted successfully<br>";
    } else {
        echo "Error updating record: " . mysqli_error($conn) . "<br>";
    }
}


// Handle editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update1'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $created_at = mysqli_real_escape_string($conn, $_POST['created_at']);

    $sql = "UPDATE contact_form_submissions SET name='$name', email='$email', subject='$subject', message='$message',created_at='$created_at' WHERE id=$id";

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

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
    </style>
</head>

<body>

    <?php
    include "./adminHeader.php";
    ?>
    <center>
        <h2>Contact Through message Data</h2>
    </center>
    <button onclick="window.history.back();"
        style="border: 3px solid orange; background: none; cursor: pointer; font-size: 20px; 
               color: #ED6436; padding: 8px 16px; border-radius: 8px; 
               transition: all 0.3s ease; font-weight: bold;">
        ⬅️Back
    </button>

    <?php
    // Fetch and display data from the database
    $sql = "SELECT id, name, email, subject, message, created_at FROM contact_form_submissions";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>SUBJECT</th>
    <th>MESSAGE</th>
    <th>CREATED_AT</th>
    <th>ACTIONS</th>
    </tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["subject"] . "</td>
        <td>" . $row["message"] . "</td>
         <td>" . $row["created_at"] . "</td>
        <td>
            <a class='btn btn-danger' href='contdatatable.php?delete=" . $row['id'] . "'>Delete</a> |
            <a class='btn btn-success' href='contdatatable.php?edit=" . $row['id'] . "'>Edit</a>
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
        $sql = "SELECT * FROM contact_form_submissions WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
    ?><br><br>
            <!-- edit event form  -->
            <div class="container">
                <div class="title">Edit Event</div>
                <form method="POST" action="contdatatable.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="input-box">
                        <label for="name">name:</label>
                        <input type="text" id="full_name" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="email">email:</label>
                        <input type="email" id="username" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="subject">subject:</label>
                        <input type="text" id="subject" name="subject" value="<?php echo $row['subject']; ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="message">message:</label>
                        <input type="text" id="message" name="message" value="<?php echo $row['message']; ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="created_at">created_at:</label>
                        <input type="text" id="created_at" name="created_at" value="<?php echo $row['created_at']; ?>" required>
                    </div>

                    <div class="button">
                        <input type="submit" name="update1" value="Update">
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

</body>

</html>

<?php
// Close connection
mysqli_close($conn);
?>