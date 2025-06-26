<?php
include 'connect.php';

// Get unique user details
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$page = basename($_SERVER['PHP_SELF']);

// Insert new visit
mysqli_query($conn, "INSERT INTO user_activity (user_ip, user_agent, page_visited, entry_time, last_activity) 
                     VALUES ('$user_ip', '$user_agent', '$page', NOW(), NOW())");

mysqli_query($conn, "UPDATE user_activity SET exit_time = NOW() WHERE user_ip = '$user_ip' AND exit_time IS NULL");

// Set exit time when user leaves
register_shutdown_function(function () use ($conn, $user_ip, $user_agent) {
    mysqli_query($conn, "UPDATE user_activity SET exit_time = NOW() 
                         WHERE user_ip='$user_ip' AND user_agent='$user_agent' AND exit_time IS NULL");
});
