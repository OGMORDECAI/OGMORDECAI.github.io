<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your database password
$dbname = "intamba_auto_dealership"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
