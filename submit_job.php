<?php
// Database connection details
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$dbname = "job_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from the form
$location = $_POST['location'];
$jobType = $_POST['jobType'];
$salary = $_POST['salary'];
$companyName = $_POST['companyName'];
$qualification = $_POST['qualification'];
$email = $_POST['email']; // Get the email input from the form

// Insert data into the database
$sql = "INSERT INTO job_postings (location, job_type, salary, company_name, qualification, email) 
        VALUES ('$location', '$jobType', '$salary', '$companyName', '$qualification', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Job posted successfully!";

    // Define the job post content
    $jobContent = "
        <div class='job-posting'>
            <h2>" . htmlspecialchars($jobType) . "</h2>
            <p>Location: " . htmlspecialchars($location) . "</p>
            <p>Job Type: " . htmlspecialchars($jobType) . "</p>
            <p>Salary: " . htmlspecialchars($salary) . "</p>
            <p>Company: " . htmlspecialchars($companyName) . "</p>
            <p>Qualification: " . htmlspecialchars($qualification) . "</p>
            <p>Email: <a href='mailto:" . htmlspecialchars($email) . "'>" . htmlspecialchars($email) . "</a></p>
        </div>
    ";

    // Append to specific category file based on job type
    switch (strtolower($jobType)) {
        case 'medicine':
            file_put_contents('medicine.php', $jobContent, FILE_APPEND);
            break;
        case 'it':
            file_put_contents('it.php', $jobContent, FILE_APPEND);
            break;
        case 'project manager':
            file_put_contents('project_manager.php', $jobContent, FILE_APPEND);
            break;
        case 'hr':
            file_put_contents('hr.php', $jobContent, FILE_APPEND);
            break;
        case 'digital marketing':
            file_put_contents('digital-marketing.php', $jobContent, FILE_APPEND);
            break;
    }

    // Append to search.php for all job postings
    file_put_contents('search.php', $jobContent, FILE_APPEND);

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
