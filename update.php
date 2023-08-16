<?php
// update_timetable.php

// Include the connect.php file to establish the database connection
include 'connect.php';

// Check if the form is submitted with POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $id = $_POST['id'];
    $selectedCourse = $_POST['c_name'];
    $selectedSemester = $_POST['semester'];
    $subjectName = $_POST['subject_name'];
    $facultyName = $_POST['faculty_name'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $c_room = $_POST['c_room'];

    // Update the timetable data in the database
    $sql = "UPDATE tt SET c_name = '$selectedCourse', semester = '$selectedSemester', subject_name = '$subjectName', faculty_name = '$facultyName', day = '$day', time = '$time', c_room = '$c_room' WHERE id = '$id'";

    if (mysqli_query($con, $sql)) {
        $sql = "INSERT INTO tt (c_name, semester, subject_name, faculty_name, day, time, c_room) VALUES ('$selectedCourse', '$selectedSemester', '$subjectName', '$facultyName', '$day', '$time', '$c_room')";
        // Redirect back to the timetable page after successful update
        header('Location: fetch.php');
        exit();
    } else {
        echo 'Error: ' . mysqli_error($con);
    }
} else {
    echo 'Invalid request.';
}
?>
