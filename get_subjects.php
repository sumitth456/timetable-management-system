<?php
// Assuming you have a database connection
include 'connect.php';

// Retrieve the selected course and semester from the query parameters
$selectedCourse = $_GET['c_name'];
$selectedSemester = $_GET['semester'];

// Prepare the query to fetch subjects for the selected course and semester
$sqlSubjects = "SELECT subject_name FROM subjects WHERE c_name = '$selectedCourse' AND semester = '$selectedSemester'";
$resultSubjects = mysqli_query($con, $sqlSubjects);

// Generate the HTML content for the subjects as options for the <select> box
$subjectsOptions = '';
if ($resultSubjects && mysqli_num_rows($resultSubjects) > 0) {
    while ($rowSubjects = mysqli_fetch_assoc($resultSubjects)) {
        $subject = $rowSubjects['subject_name'];
        $subjectsOptions .= "<option value='$subject'>$subject</option>";
    }
} else {
    $subjectsOptions = "<option value=''>No subjects found for the selected course and semester.</option>";
}

// Send the HTML content back as the response
echo $subjectsOptions;
?>
