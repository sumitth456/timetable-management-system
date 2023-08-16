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
    <th scope="col">id</th>
      <th scope="col">course-name</th>
      <th scope="col">course-code</th>
    </tr>
  </head>
  <body>
   <?php

$sql="Select * from courses";
$result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $cname = $row['cname'];
                        $coursecode= $row['coursecode'];
                        
                        echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $cname . '</td>
                            <td>' . $coursecode . '</td>
                            
                        </tr>';
                    }


} 
   
?>
  
   
  </body>
</table>

</div>
</body>
</html>