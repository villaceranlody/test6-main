<?php
// Database credentials
$hostname = "localhost"; // Replace with your database host
$username = "lody";      // Replace with your database username
$password = "villaceran";          // Replace with your database password
$database = "students";  // Replace with your database name

// Create a connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
