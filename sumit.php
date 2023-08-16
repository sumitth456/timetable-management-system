<?php
include 'connect.php';

    $sql = "SELECT * FROM subjects WHERE course = '$course'";

    // Execute the query
    $result = $con->query($sql);

    // Display the subjects in HTML
    if ($result && $result->num_rows > 0) {
        echo "<h2>Subjects for $course:</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            $subject_name = $row['subject_name'];
            echo "<li>$subjectName</li>";
        }
        echo "</ul>";
    } else {
        echo "No subjects found for $course.";
    }

   

?>










<!DOCTYPE html>
<html>
<head>
    <title>Subject Selection</title>
</head>
<body>
    <h1>Subject Selection</h1>
    <form action="fetch_subjects.php" method="POST">
        <label for="course">Select Course:</label>
        <select name="course" id="course">
            <option value="mca">MCA</option>
            <option value="bca">BCA</option>
            <option value="btech">Btech</option>
            <option value="mtech">Mtech</option>
            
        </select>
        <br>
        <input type="submit" value="Fetch Subjects">
    </form>
</body>
</html>
