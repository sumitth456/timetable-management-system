<?php
// edit_timetable.php

// Include the connect.php file to establish the database connection
include 'connect.php';

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the timetable data for the given 'id'
    $sql = "SELECT * FROM tt WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display the editable form with the fetched data
        echo '
            <form method="post" action="update.php">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                <label for="c_name">Course name:</label>
                <input type="text" name="c_name" value="' . $row['c_name'] . '" required><br>
                <label for="semester">Semester:</label>
                <input type="text" name="semester" value="' . $row['semester'] . '" required><br>
                <label for="subject_name">Subject Name:</label>
                <input type="text" name="subject_name" value="' . $row['subject_name'] . '" required><br>
                <label for="faculty_name">Faculty Name:</label>
                <input type="text" name="faculty_name" value="' . $row['faculty_name'] . '" required><br>
                <label for="day">Day:</label>
                <input type="text" name="day" value="' . $row['day'] . '" required><br>
                <label for="time">Time:</label>
                <input type="text" name="time" value="' . $row['time'] . '" required><br>
                <label for="c_room">Classroom:</label>
                <input type="text" name="c_room" value="' . $row['c_room'] . '" required><br>
                <input type="submit" value="Update">
            </form>
        ';
    } else {
        echo 'Timetable data not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
