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
      
      <th scope="col"><h1>faculty-name</th>
      
    </tr>
  </head>
  <body>
   <?php

$sql="Select * from faculty";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $id = $row['id'];
                        
                      $faculty_name= $row['faculty_name'];
                        echo '<tr>
                            <th scope="row">' . $id . '</th>
                           
                            <td>' . $faculty_name. '</td>
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