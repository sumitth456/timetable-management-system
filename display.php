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
      <th scope="col"><h1>room</th>
      <th scope="col"><h1>capacity</th>
      <th scope="col"><h1>floor</th>
      
    </tr>
  </head>
  <body>
   <?php

$sql="Select * from class";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $room=$row['room'];
        $capacity=$row['capacity'];
        $floor=$row['floor'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$room.'</td>
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