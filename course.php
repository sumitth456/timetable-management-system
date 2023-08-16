<?php
include 'connect.php';
include 'homepage.html';



if(isset($_POST['submit']))
{
  
  $cname=$_POST['cname'];
  $coursecode=$_POST['coursecode'];  

  $sql="INSERT INTO courses(cname,coursecode)
  values('$cname','$coursecode')";


  $result=mysqli_query($con,$sql);
  if($result){
    //echo "data inserted successfully";
    header('location:course.php');
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
<h1>
 


<div class="form">
    <label for="cname">course</label>
    <input id="text" class="form" type="text" name="cname" autocomplete="off">
    
    
   </div>

<div class="form">
    <label for="coursecode">course-code</label>
    <input id="text" class="form" type="number" name="coursecode" autocomplete="off">
</div>




  

   


</h1> 

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    <?php include 'dcourse.php'; ?>

  </body>
</html>