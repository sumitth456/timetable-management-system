<!DOCTYPE html>
<html>
<head>
  <style>
    .form {
      margin-bottom: 10px;
    }
    
    label {
      font-weight: bold;
      display: block;
      color: blue;
    }
    
    select {
      width: 200px;
      padding: 15px;
      border: 2px solid orange;
      border-radius: 5px;
    }
     
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
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

  <?php
        
        include 'connect.php';
        include 'homepage.html';
        // Code to fetch courses from the database and populate the 'Course name' dropdown
        function getAvailableClassrooms($con, $day, $time) {
            // Query to get all classrooms available at the given day and time
            $availableRoomsQuery = "SELECT room FROM class WHERE room NOT IN (SELECT c_room FROM tt WHERE day = '$day' AND time = '$time')";
            $result = mysqli_query($con, $availableRoomsQuery);
            $availableClassrooms = array();
    
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $availableClassrooms[] = $row['room'];
                }
            }
    
            return $availableClassrooms;
        }

        $sql = "SELECT id, room  FROM class";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo '<div class="form">';
    echo '<label for="c_room">Select ClassRoom:</label>';
    echo '<select id="c_room" name="c_room">';
    
    // Generate the <option> tags dynamically based on the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $room = $row['room'];
        

        echo '<option value="' . $room . '">' . $room . '</option>';
    }
    echo '</select>';
    echo '</div>';
}
        $sql = "SELECT id, cname FROM courses";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo '<div class="form">';
            echo '<label for="c_name">Course name:</label>';
            echo '<select id="c_name" name="c_name" onchange="loadSemesters()">';

            // Generate the <option> tags dynamically based on the query result
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $cname = $row['cname'];

                echo '<option value="' . $cname . '">' . $cname . '</option>';
            }
            echo '</select>';
            echo '</div>';
            
        }
      

        function checkConflicts($con, $selectedSemester, $facultyName, $day, $time) {
            // Query to check if a faculty member has any classes at the same time on the same day
            $conflictQuery = "SELECT * FROM tt WHERE semester = '$selectedSemester' AND faculty_name = '$facultyName' AND day = '$day' AND time = '$time'";
            $result = mysqli_query($con, $conflictQuery);
  
            if ($result && mysqli_num_rows($result) > 0) {
                return true; // Conflict found
            } else {
                return false; // No conflict
            }
        }
  

        // Include JavaScript code to handle the onchange event and load subjects
        echo '<script>
                function loadSubjects() {
                    var courseSelect = document.getElementById("c_name");
                    var semesterSelect = document.getElementById("semester");
                    var selectedCourse = courseSelect.value;
                    var selectedSemester = semesterSelect.value;

                    // Make an AJAX request to fetch subjects for the selected course and semester
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var subjectsDiv = document.getElementById("subjects");
                            subjectsDiv.innerHTML = xhr.responseText;
                        }
                    };
                    xhr.open("GET", "get_subjects.php?c_name=" + selectedCourse + "&semester=" + selectedSemester, true);
                    xhr.send();
                }

                function loadSemesters() {
                    var courseSelect = document.getElementById("c_name");
                    var selectedCourse = courseSelect.value;

                    // Make an AJAX request to fetch semesters for the selected course
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var semesterSelect = document.getElementById("semester");
                            semesterSelect.innerHTML = xhr.responseText;
                        }
                    };
                    xhr.open("GET", "get_semesters.php?c_name=" + selectedCourse, true);
                    xhr.send();

                    // After updating the semester options, trigger the loadSubjects() function to fetch the subjects for the selected course and semester
                    loadSubjects(); // Trigger loadSubjects() to fetch subjects for the new semester
                }

                // Call loadSemesters() initially to populate the semester dropdown
                loadSemesters();


                
            </script>';

        echo '<div class="form">';
        echo '<label for="semester">Select semester:</label>';
        echo '<select id="semester" name="semester" onchange="loadSubjects()"></select>';
        echo '</div>';

        echo '<div>';
        echo '<label for="subjects">Subjects:</label>';
        echo '<select id="subjects" name="subjects"></select>';
        echo '</div>';


        $sql = "SELECT id ,faculty_name FROM faculty";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo '<div class="form">';
    echo '<label for="faculty_name">Select Faculty:</label>';
    echo '<select id="faculty_name" name="faculty_name">';

    // Generate the <option> tags dynamically based on the query result
    while ($row = mysqli_fetch_assoc($result)) {
        $facultyName = $row['faculty_name'];
        $id = $row['id'];

        echo '<option value="' . $facultyName . '">' . $facultyName . '</option>';
    }
    echo '</select>';
    echo '</div>';
}

        



        echo '<div class="form">';
        echo '<label for="day">Day:</label>';
        echo '<select id="day" name="day">';
        echo '<option value="monday">Monday</option>';
        echo '<option value="tuesday">Tuesday</option>';
        echo '<option value="wednesday">Wednesday</option>';
        echo '<option value="thursday">Thursday</option>';
        echo '<option value="friday">Friday</option>';
        echo '</select>';
        echo '</div>';

        echo '<div class="form">';
        echo '<label for="time">Time:</label>';
        echo '<input id="time" class="form" type="text" name="time" autocomplete="off">';
        echo '</div>';

        // Form submission button and closing the form
        echo '<input type="submit" value="Submit">';
        echo '</form>';

        // Handle the form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form data
            $selectedCourse = $_POST["c_name"];
            $selectedSemester = $_POST["semester"];
            $subjectName = $_POST["subjects"];
            $facultyName = $_POST["faculty_name"];
            $day = $_POST["day"];
            $time = $_POST["time"];
            $c_room= $_POST["c_room"];

            $conflict = checkConflicts($con, $selectedSemester, $facultyName, $day, $time);
            $roomAvailabilityQuery = "SELECT * FROM tt WHERE c_room= '$c_room' AND day = '$day' AND time = '$time'";
            $roomAvailabilityResult = mysqli_query($con, $roomAvailabilityQuery);
            $roomAvailable = ($roomAvailabilityResult && mysqli_num_rows($roomAvailabilityResult) === 0);
        
            // If no conflicts and the room is available, perform the insert query to add the form data to the database table
            if (!$conflict && $roomAvailable) {
                $sql = "INSERT INTO tt (c_name, semester, subject_name, faculty_name, day, time, c_room) VALUES ('$selectedCourse', '$selectedSemester', '$subjectName', '$facultyName', '$day', '$time', '$c_room')";
        
                if (mysqli_query($con, $sql)) {
                    // Show a success message
                    echo "Classroom booked successfully!";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                // If there are no available classrooms
                if (empty($availableClassrooms)) {
                    echo "No classrooms are available at the selected day and time.";
                } else {
                    // Show the scheduling conflict or other error messages as before
                    if ($conflict) {
                        echo "Scheduling conflict detected. Please choose a different time slot.";
                    }
                    if (!$roomAvailable) {
                        echo "Room is not available at the selected day and time.";
                    }
                }
            }
        }
        
        // After checking for scheduling conflicts and room availability, use the following code to get the available classrooms
      
        
      

        ?>
        
<h2>Timetable:</h2>
        <table class="table">
            <thead>
                <tr>
                    <th><h1>Course Name</th>
                    <th><h1>Semester</th>
                    <th><h1>Subject Name</th>
                    <th><h1>Faculty Name</th>
                    <th><h1>Day</th>
                    <th><h1>Time</h2></th>
                    <th><h1>ClassROom</h2></th>
                    
                </tr>
            </thead>
            <tbody>
            
                <?php
                // PHP code for displaying the timetable table
                // The following PHP code should be placed here:

                // Check if the form is submitted with POST method
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get the selected course name and semester from the form
                    if (isset($_POST["c_name"]) && isset($_POST["semester"])) {
                        $selectedCourse = $_POST["c_name"];
                        $selectedSemester = $_POST["semester"];
                        $day = $_POST["day"];
                        $time = $_POST["time"];

                        // Fetch and display the timetable data for the selected course and semester
                        $sql = "SELECT * FROM tt WHERE c_name = '$selectedCourse' AND semester = '$selectedSemester'";
                        $result = mysqli_query($con, $sql);

                        

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['c_name'] . '</td>';
                                echo '<td>' . $row['semester'] . '</td>';
                                echo '<td>' . $row['subject_name'] . '</td>';
                                echo '<td>' . $row['faculty_name'] . '</td>';
                                echo '<td>' . $row['day'] . '</td>';
                                echo '<td>' . $row['time'] . '</td>';
                                echo '<td>' . $row['c_room'] . '</td>';
                                echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6">No timetable data available for the selected course and semester.</td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No course and semester selected.</td></tr>';
                    }
                    $availableClassrooms = getAvailableClassrooms($con, $day, $time);
                    // Display the available classrooms
                   echo "<h2>Available Classrooms:</h2>";
echo "<ul>";
foreach ($availableClassrooms as $room) {
    echo "<li>$room</li>";
}
echo "</ul>";
                }

               
                ?>
            </tbody>
        </table>
    </body>
</html>