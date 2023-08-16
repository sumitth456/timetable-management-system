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
<button class="btn btn-primary"><a href="lab.php"><h3>Add user</h3></a>


</button>

<table class="table">
  <head>
    <tr>
      <th scope="col"><h1>id</th>
      <th scope="col"><h1>lab-no</th>
      <th scope="col"><h1>capacity</th>
      <th scope="col"><h1>floor</th>
      
    </tr>
  </head>
  <body>
   <?php

$sql="Select * from lab";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $lab_no=$row['lab_no'];
        $capacity=$row['capacity'];
        $floor=$row['floor'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$lab_no.'</td>
        <td>'.$capacity.'</td>
        <td>'.$floor.'</td>
        
    </tr>';
    }


} 
   
?>
  
   
  </body>
</table>

</div>
</body>
</html>