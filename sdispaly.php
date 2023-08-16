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
      <th scope="col"><h1>subject_name</th>
      <th scope="col"><h1>course name</th>
      <th scope="col"><h1>shortform</th>
      <th scope="col"><h1>subcode</th>
      <th scope="col"><h1>semester</th>
      
    </tr>
  </head>
  <body>
   <?php

$sql="Select * from subjects";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $subject_name = $row['subject_name'];
                        $c_name = $row['c_name'];
                        $shortform = $row['shortform'];
                        $subcode = $row['subcode'];
                        $semester = $row['semester'];
                        echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $subject_name . '</td>
                            <td>' . $c_name . '</td>
                            <td>' . $shortform . '</td>
                            <td>' . $subcode . '</td>
                            <td>' . $semester . '</td>
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