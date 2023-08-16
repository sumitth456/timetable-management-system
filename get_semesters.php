<?php
// get_semesters.php

// Assuming you have a database connection
include 'connect.php';

// Retrieve the selected course from the query parameter
$selectedCourse = $_GET['c_name'];

// Prepare the query to fetch semesters for the selected course
$sqlSemester = "SELECT  DISTINCT semester FROM subjects WHERE c_name= '$selectedCourse'";
$resultSemester = mysqli_query($con, $sqlSemester);

// Generate the HTML options for the semester select element
$semesterOptions = '';
if ($resultSemester && mysqli_num_rows($resultSemester) > 0) {
    while ($rowSemester = mysqli_fetch_assoc($resultSemester)) {
        $semester = $rowSemester['semester'];
        $semesterOptions .= "<option value='$semester'>$semester</option>";
    }
}

// Send the HTML options back as the response
echo $semesterOptions;
?>
