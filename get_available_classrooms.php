<?php
// get_available_classrooms.php

// Include the connect.php file to establish the database connection
include 'connect.php';

// Check if the day and time parameters are provided in the URL
if (isset($_GET['day']) && isset($_GET['time'])) {
    $day = $_GET['day'];
    $time = $_GET['time'];

    // Fetch and display the available classrooms for the selected day and time
    $availableClassrooms = getAvailableClassrooms($con, $day, $time);

    echo "<h2>Available Classrooms:</h2>";
    echo "<ul>";
    foreach ($availableClassrooms as $room) {
        echo "<li>$room</li>";
    }
    echo "</ul>";
} else {
    echo 'Invalid request.';
}
?>
