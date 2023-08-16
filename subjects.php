<?php
include 'connect.php';
include 'homepage.html';

if(isset($_POST['submit']))
{
  
  $subject_name=$_POST['subject_name'];
  $c_name=$_POST['c_name'];
  
  $shortform=$_POST['shortform'];
  $subcode=$_POST['subcode'];
  $semester=$_POST['semester'];

  $sql="INSERT INTO subjects(subject_name,c_name,shortform,subcode,semester)
  values('$subject_name','$c_name','$shortform','$subcode','$semester')";


  $result=mysqli_query($con,$sql);
  if($result){
    //echo "data inserted successfully";
    //header('location:subjects.php');
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
    <form action="fetch.php" method="POST">
<h1>
  <br><br>
  <div class="form">
    <label for="subject_name">subject-name</label>
    <input id="text" class="form" type="text" name="subject_name" autocomplete="off">
   </div>

   <?php
   $sql = "SELECT id, cname FROM courses";
   $result = mysqli_query($con, $sql);

   if ($result && mysqli_num_rows($result) > 0) {
    echo '<div class="form">';
    echo '<label for="c_name">Course name:</label>';
    echo '<select id="c_name" name="c_name">';

    // Generate the <option> tags dynamically based on the query result
    while ($row = mysqli_fetch_assoc($result)) {
        
        $cname = $row['cname'];

        echo '<option value="' . $cname. '">' . $cname . '</option>';
    }


    echo '</select>';
    echo '</div>';
}

// Close the database connection
mysqli_close($con);
?>

   
   

   
   <div class="form">
    <label for="shortform">Subject-Shortform</label>
    <input id="text" class="form" type="text"  name="shortform"  autocomplete="off">

    
   </div>


   <div class="form">
   <label for="subcode">Subject-Code</label>
   <input id="text" class="form" type="text"  name="subcode"  autocomplete="off">

   
  </div>


  <div class="form">
   <label for="semester">Semester</label>
   <input id="text" class="form" type="text"  name="semester"  autocomplete="off">

   
  </div>



</h1> 

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    <?php include 'sdispaly.php';?>

  </body>
</html>