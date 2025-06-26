<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petlover";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch dates that already have two bookings
$sql = "SELECT reservation_date FROM bookings GROUP BY reservation_date HAVING COUNT(*) >= 2";
$result = $conn->query($sql);

$unavailable_dates = [];
while ($row = $result->fetch_assoc()) {
    $unavailable_dates[] = $row['reservation_date'];
}

echo json_encode($unavailable_dates);

$conn->close();
