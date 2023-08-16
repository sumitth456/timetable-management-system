<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["reg_username"];
    $password = password_hash($_POST["reg_password"], PASSWORD_BCRYPT);

    // Query to check if the username already exists
    $checkQuery = "SELECT * FROM users WHERE username='$username'";
    $checkResult = mysqli_query($con, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        echo "Username already exists!";
    } else {
        // Query to insert user data into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($con, $sql)) {
            // Registration successful, redirect to login page
            header("Location: index.html");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

mysqli_close($con);
?>
