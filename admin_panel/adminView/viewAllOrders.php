<?php
require 'dbconnect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM getbook WHERE ID=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
    }
}

// Handle editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $event_venue = mysqli_real_escape_string($conn, $_POST['event_venue']);
    $event_time = mysqli_real_escape_string($conn, $_POST['event_time']);
    $plan = mysqli_real_escape_string($conn, $_POST['plans']);

    $sql = "UPDATE getbook SET FULLNAME='$full_name', USERNAME='$username', EMAIL='$email', PHONENO='$phone_number', 
            EVENTDATE='$event_date', EVENTVENUE='$event_venue', EVENTTIME='$event_time', PLANS='$plan' WHERE ID=$id";

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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Event Data</h2>
<?php
// Fetch and display data from the database
$sql = "SELECT ID, FULLNAME, USERNAME, EMAIL, PHONENO, EVENTDATE, EVENTVENUE, EVENTTIME, PLANS FROM getbook";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>
    <tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Your Services</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Event Date</th>
    <th>Event Venue</th>
    <th>Event Time</th>
    <th>Plans</th>
    <th>Actions</th>
    </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . $row["ID"] . "</td>
        <td>" . $row["FULLNAME"] . "</td>
        <td>" . $row["USERNAME"] . "</td>
        <td>" . $row["EMAIL"] . "</td>
        <td>" . $row["PHONENO"] . "</td>
        <td>" . $row["EVENTDATE"] . "</td>
        <td>" . $row["EVENTVENUE"] . "</td>
        <td>" . $row["EVENTTIME"] . "</td>
        <td>" . $row["PLANS"] . "</td>
        <td>
            <a href='table.php?delete=" . $row['ID'] . "'>Delete</a> |
            <a href='table.php?edit=" . $row['ID'] . "'>Edit</a>
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
    $sql = "SELECT * FROM getbook WHERE ID=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
?><br><br>
        <!-- edit event form  -->
        <div class="container">
        <div class="title">Edit Event</div>
        <form method="POST" action="table.php">
            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

            <div class="input-box">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo $row['FULLNAME']; ?>" required>
            </div>

            <div class="input-box">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $row['USERNAME']; ?>" required>
            </div>

            <div class="input-box">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['EMAIL']; ?>" required>
            </div>

            <div class="input-box">
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['PHONENO']; ?>" required>
            </div>

            <div class="input-box">
                <label for="event_date">Event Date:</label>
                <input type="date" id="event_date" name="event_date" value="<?php echo $row['EVENTDATE']; ?>" required>
            </div>

            <div class="input-box">
                <label for="event_venue">Event Venue:</label>
                <input type="text" id="event_venue" name="event_venue" value="<?php echo $row['EVENTVENUE']; ?>" required>
            </div>

            <div class="input-box">
                <label for="event_time">Event Time:</label>
                <input type="time" id="event_time" name="event_time" value="<?php echo $row['EVENTTIME']; ?>" required>
            </div>

            <div class="input-box">
                <label for="plans">Plan:</label>
                <input type="text" id="plans" name="plans" value="<?php echo $row['PLANS']; ?>" required>
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

</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?>
