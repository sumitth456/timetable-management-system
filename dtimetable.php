<?php
include 'connect.php';

?>
<!doctype html>
<html >
  <head>
  <style>

h2 {
  background-color: black;
  color: green;
}

h1 {
  background-color: white;
  color: blue;
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
      <th scope="col"><h1>id</th>
      <th scope="col"><h1>course-id</th>
      <th scope="col"><h1>subject-id</th>
      <th scope="col"><h1>day</th>
      <th scope="col"><h1>time</th>
      <th scope="col"><h1>faculty-id</th>
      
    </tr>
  </head>
  <body>
   <?php

$sql="Select * from display";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $courseid= $row['courseid'];
                        $subjectid= $row['subjectid'];
                        $day = $row['day'];
                        $time = $row['time'];
                        $faculty_id=$row['faculty_id'];
                        echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $courseid . '</td>
                            <td>' . $subjectid . '</td>
                            <td>' . $day . '</td>
                            <td>' . $time . '</td>
                            <td>' . $faculty_id . '</td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No data found</td></tr>';
                }
   
?>
  
   
  </body>
</table>

</div>
</body>
</html>