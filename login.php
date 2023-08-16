<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to fetch user data from the database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION["username"] = $row["username"];
            header("Location: class.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid password!";
        }
    } else {
        // User not found
        echo "User not found!";
    }
}

mysqli_close($con);
?>
