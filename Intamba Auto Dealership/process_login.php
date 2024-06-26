<?php
global $conn;
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Retrieve hashed password from database
    $sql = "SELECT password FROM Users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header("Location: index.php"); // Redirect to homepage or wherever after login
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}

mysqli_close($conn);
?>
