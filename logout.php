<?php
require 'connect.php'; // Database connection

if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];

    // Delete user data from all tables
    $delete_user_query = "DELETE FROM user WHERE email = ?";
    $delete_booking_query = "DELETE FROM bookings WHERE email = ?";
    $delete_contact_query = "DELETE FROM contact_form_submissions WHERE email = ?";

    $delete_user_stmt = $conn->prepare($delete_user_query);
    $delete_booking_stmt = $conn->prepare($delete_booking_query);
    $delete_contact_stmt = $conn->prepare($delete_contact_query);

    if ($delete_user_stmt && $delete_booking_stmt && $delete_contact_stmt) {
        $delete_user_stmt->bind_param("s", $email);
        $delete_booking_stmt->bind_param("s", $email);
        $delete_contact_stmt->bind_param("s", $email);

        // Execute delete queries
        $user_deleted = $delete_user_stmt->execute();
        $booking_deleted = $delete_booking_stmt->execute();
        $contact_deleted = $delete_contact_stmt->execute();

        // Close statements
        $delete_user_stmt->close();
        $delete_booking_stmt->close();
        $delete_contact_stmt->close();
    }

    // Delete the email cookie
    setcookie("email", "", time() - 3600, "/");

    echo "<script>
    alert('You have successfully logged out.');
    window.location.href = '/Petlover/loginuser/login.php';
</script>";
} else {
    // If no email cookie, redirect to login page
    header("Location: /Petlover/loginuser/login.php");
    exit();
}
