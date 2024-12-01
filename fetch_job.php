<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli("localhost", "root", "", "job_portal");

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT location, job_type, salary, company_name, qualification, email FROM job_postings WHERE job_type = 'HR' ORDER BY id DESC";
$result = $conn->query($sql);

$jobs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}

$conn->close();

echo json_encode($jobs);
