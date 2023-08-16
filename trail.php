<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $subject_name = $_POST['subject_name'];
  $c_id = $_POST['c_id'];
  $shortform = $_POST['shortform'];
  $subcode = $_POST['subcode'];

  $sql1 = "INSERT INTO subjects(subject_name, c_id, shortform, subcode) VALUES ('$subject_name', '$c_id', '$shortform', '$subcode')";
  $result1 = mysqli_query($con, $sql1);

  if ($result1) {
    // echo "data inserted successfully";
    // header('location:subjects.php');
  } else {
    die(mysqli_error($con));
  }

  // Add another insert query
  $cname=$_POST['cname'];
  $coursecode = $_POST['coursecode'];

  $sql2 = "INSERT INTO courses(cname, coursecode) VALUES ('$cname', '$coursecode')";
  $result2 = mysqli_query($con, $sql2);

  if ($result2) {
    // echo "data inserted successfully";
    // header('location: your_page1.php');
  } else {
    die(mysqli_error($con));
  }

  // Add another insert query
  $data1 = $_POST['data1'];
  $data2 = $_POST['data2'];

  $sql3 = "INSERT INTO your_table2(columnA, columnB) VALUES ('$data1', '$data2')";
  $result3 = mysqli_query($con, $sql3);

  if ($result3) {
    // echo "data inserted successfully";
    // header('location: your_page2.php');
  } else {
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

   <div class="form">
    <label for="c_id">Course ID</label>
    <input id="text" class="form" type="text" name="c_id" autocomplete="off">
   </div>

   
   <div class="form">
    <label for="shortform">Subject-Shortform</label>
    <input id="text" class="form" type="text"  name="shortform"  autocomplete="off">

    
   </div>


   <div class="form">
   <label for="subcode">Subject-Code</label>
   <input id="text" class="form" type="text"  name="subcode"  autocomplete="off">

   
  </div>



</h1> 

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
   

  </body>
</html>
