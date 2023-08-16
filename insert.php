<?php

$servername = "localhost"; 
$username = "root"; 
$password = " "; 
$dbname = "classroom";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username= $_POST['username'];
$password = $_POST['password'];



$sql = "INSERT INTO login(username, password)
        VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo '<a href="sumit.html">Home Page</a>';
} else {
    echo "Error adding user: " . $conn->error;
}

$conn->close();
?>


<html>
<head>
  <title>Link Example</title>
</head>
<body>
  

  
