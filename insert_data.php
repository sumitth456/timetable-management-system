<?php

include 'connect.php';

// Check if the form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $selectedCourse = $_POST["c_name"];
    $selectedSemester = $_POST["semester"];
    $subjectName = $_POST["subjects"];
    $facultyName = $_POST["faculty_name"];
    $day = $_POST["day"];
    $time = $_POST["time"];

    // Perform the insert query to add the form data to the database table (change 'timetable_table' to your actual table name)
    $sql = "INSERT INTO tt (c_name, semester, subject_name, faculty_name, day, time) VALUES ('$selectedCourse', '$selectedSemester', '$subjectName', '$facultyName', '$day', '$time')";

    if (mysqli_query($con, $sql)) {
        //echo "";
        
        
    } else {
        echo "Error: " . mysqli_error($con);
    }
}


?>

<!doctype html>
<html >
  <head>
  <style>

h2 {

  background-color: white;
  color: blue;
}

h1 {
  background-color: white;
  color: orange;
}


table, th, td {
  border: 1px solid;
}

</style>
    

    <title>display</title>
  </head>
  <body>

<div class="container">



</button>

<table class="table">
  <head>
    <tr>
      <th scope="col"><h1>Course Name</th>
      <th scope="col"><h1>semester</th>
      
      <th scope="col"><h1>subject-name</th>
      <th scope="col"><h1>faculty-name</th>
      <th scope="col"><h1>day</th>
      <th scope="col"><h1>time</th>
      
    </tr>
  </head>
  <body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted with POST method

    // Get the selected course name and semester from the form
    if (isset($_POST["c_name"]) && isset($_POST["semester"])) {
        $selectedCourse = $_POST["c_name"];
        $selectedSemester = $_POST["semester"];

        // Fetch and display the timetable data for the selected course and semester
        $sql = "SELECT * FROM tt WHERE c_name = '$selectedCourse' AND semester = '$selectedSemester' ";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo '<div>';
            echo '<label for="timetable">Timetable:</label>';
            
            

            // Display the timetable data in the table
            // Loop through each row of data and display it in the table
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['c_name'] . '</td></h1>';
    echo '<td>' . $row['semester'] . '</td></h1>';
    echo '<td>' . $row['faculty_name'] . '</h1></td>';
    echo '<td>' . $row['subject_name'] . '</td>';
    echo '<td>' . $row['day'] . '</td>';
    echo '<td>' . $row['time'] . '</td>';
    echo '</tr>';
  }

  
            echo '</div>';
        } else {
            echo '<div>';
            echo '<label for="timetable">Timetable:</label>';
            echo '<p>No timetable data available for the selected course and semester.</p>';
            echo '</div>';
        }
    } else {
        echo '<div>';
        echo '<label for="timetable">Timetable:</label>';
        echo '<p>No course and semester selected.</p>';
        echo '</div>';
    }
}
?>



</body>
</table>
</html>
