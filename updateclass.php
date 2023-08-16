<?php
include 'connect.php';
$id=$_GET['updateid'];
if(isset($_POST['submit']))
{
  
  $room=$_POST['room'];
  $capacity=$_POST['capacity'];
  $floor=$_POST['floor'];

  $sql="UPDATE class SET id='$id',room='$room',capacity='$capacity',floor='$floor'";


  $result=mysqli_query($con,$sql);
  if($result){
    echo "updated successfully";    
    //header('location:display.php');
  }else{
    die(mysqli_error($con));  
  }
}


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

input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}


input[type=email] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}


input[type=number] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}


.Submit {
  background-color: green;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}



</style>
    

    <title>Classroom</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
<h1>
  <br><br>
  <div class="form">
    <label for="room">Room-No</label>
    <input id="number" class="form" type="number" placeholder="room" name="room" autocomplete="off">
   </div>
<br><br>
   <div class="form">
    <label for="capacity">Capacity</label>
    <input required id="number" class="form"  type="number"  name="capacity"  autocomplete="off">
   </div>

   <div class="form">
    <label for="floor">Floor</label>
    <input id="number" class="form" type="number"  name="floor"  autocomplete="off">

    
   </div>


</h1> 

  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
    </div>

  </body>
</html>