<?php
include 'connect.php';
include 'homepage.html';

if(isset($_POST['submit']))
{
  
  $faculty_name=$_POST['faculty_name'];

  $sql="INSERT INTO faculty(faculty_name)
  values('$faculty_name')";


  $result=mysqli_query($con,$sql);
  if($result){
    //echo "data inserted successfully";
    header('location:faculty.php');
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
}//


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
    <form action="" method="POST">
<h1>
  <br><br>
  

   <div class="form">
   <label for="faculty_name">faculty-name</label>
   <input id="text" class="form" type="text"  name="faculty_name"  autocomplete="off">

   
  </div>



</h1> 

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    <?php include 'dfaculty.php';?>

  </body>
</html>i