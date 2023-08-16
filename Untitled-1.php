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
  $value1 = $_POST['value1'];
  $value2 = $_POST['value2'];

  $sql2 = "INSERT INTO your_table1(column1, column2) VALUES ('$value1', '$value2')";
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

<!-- Rest of your HTML code -->
