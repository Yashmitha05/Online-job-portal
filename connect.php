<?php
$host = "localhost";
$user = "root";  // Change if necessary
$pass = "";      // Change if necessary
$db = "job_portal";  // Your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
