<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Activity Analytics</title>
    <style>
        h2,
        h3 {
            color: #ED6436;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #ED6436;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #ffe0d5;
            transition: 0.3s;
        }
    </style>
</head>

<body>


    <?php
    include 'adminHeader.php';
    include '../connect.php';
    ?>

    <button onclick="window.history.back();"
        style="border: 3px solid orange; background: none; cursor: pointer; font-size: 20px; 
               color: #ED6436; padding: 8px 16px; border-radius: 8px; 
               transition: all 0.3s ease; font-weight: bold;">
        ⬅️Back
    </button>
    <?php

    echo "<h2>📊 User Activity Analytics</h2>";

    // Get total visitors today
    $result = mysqli_query($conn, "SELECT COUNT(DISTINCT user_ip, user_agent) AS total_visits FROM user_activity WHERE DATE(entry_time) = CURDATE()");
    $row = mysqli_fetch_assoc($result);
    $total_visits = $row['total_visits'];

    // Get currently active users (users without an exit time)
    $active_result = mysqli_query($conn, "SELECT COUNT(DISTINCT user_ip, user_agent) AS active_users FROM user_activity WHERE exit_time IS NULL");
    $active_row = mysqli_fetch_assoc($active_result);
    $active_users = $active_row['active_users'];

    echo "<h3>📅 Total Visitors Today: <b>$total_visits</b></h3>";
    echo "<h3>🟢 Currently Active Users: <b>$active_users</b></h3>";

    echo "<table>
<tr>
    <th>ID</th>
    <th>User IP</th>
    <th>Browser</th>
    <th>Pages Visited</th>
    <th>Entry Time</th>
    <th>Last Activity</th>
    <th>Exit Time</th>
</tr>";

    // Fetch user logs
    $result = mysqli_query($conn, "SELECT user_ip, user_agent, MIN(entry_time) AS first_entry, MAX(last_activity) AS last_active, MAX(exit_time) AS exit_time 
                               FROM user_activity 
                               GROUP BY user_ip, user_agent 
                               ORDER BY first_entry DESC");
    while ($row = mysqli_fetch_assoc($result)) {
        $user_ip = $row['user_ip'];
        $user_agent = $row['user_agent'];
        $entry_time = $row['first_entry'];
        $last_activity = $row['last_active'];
        $exit_time = $row['exit_time'] ? $row['exit_time'] : '<b style="color:green;">Still Active</b>';

        // Fetch all visited pages
        $pages_query = mysqli_query($conn, "SELECT GROUP_CONCAT(DISTINCT page_visited SEPARATOR ', ') AS pages FROM user_activity WHERE user_ip='$user_ip' AND user_agent='$user_agent'");
        $pages_result = mysqli_fetch_assoc($pages_query);
        $pages_visited = $pages_result['pages'];

        echo "<tr>
        <td>-</td>
        <td>$user_ip</td>
        <td>$user_agent</td>
        <td>$pages_visited</td>
        <td>$entry_time</td>
        <td>$last_activity</td>
        <td>$exit_time</td>
    </tr>";
    }

    echo "</table>";
    ?>

</body>

</html>