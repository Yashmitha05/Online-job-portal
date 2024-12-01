<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board</title>
    <style>
        /* Styling for the Job Board page */
        body {
            font-family: Arial, sans-serif;
            background-color: #1f1f2e;
            color: #e0e0e0;
            margin: 20px;
        }
        h1 {
            color: #f72585;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .filter-form {
            background-color: #2a2a3b;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }
        .filter-form label {
            font-weight: bold;
            color: #c77dff;
            margin-bottom: 5px;
            display: block;
        }
        .filter-form select, .filter-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #333;
            background-color: #28283c;
            color: #e0e0e0;
            margin-bottom: 20px;
        }
        .filter-btn {
            background-color: #7209b7;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s;
        }
        .filter-btn:hover {
            background-color: #560bad;
        }
        .job-postings {
            max-width: 600px;
            margin: 0 auto;
        }
        .job-posting {
            background-color: #3a3a55;
            border: 1px solid #444;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .job-posting h2 {
            color: #f72585;
            font-size: 1.5rem;
            margin-top: 0;
        }
        .job-posting p {
            color: #e0e0e0;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Job Board</h1>
    
    <div class="filter-form">
        <label for="location">Location:</label>
        <select id="location">
            <option value="">Select Location</option>
            <option value="New York">New York</option>
            <option value="Los Angeles">Los Angeles</option>
            <option value="Chicago">Chicago</option>
        </select>
        
        <label for="job-type">Job Type:</label>
        <select id="job-type">
            <option value="">Select Job Type</option>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Internship">Internship</option>
        </select>
        
        <label for="salary">Salary:</label>
        <select id="salary">
            <option value="">Select Salary Range</option>
            <option value="$40k-$60k">$40k-$60k</option>
            <option value="$60k-$80k">$60k-$80k</option>
            <option value="$80k+">$80k+</option>
        </select>
        
        <label for="company">Company Name:</label>
        <input type="text" id="company" placeholder="Company Name">

        <label for="qualification">Required Qualification:</label>
        <input type="text" id="qualification" placeholder="Qualification">

        <button class="filter-btn">Filter Jobs</button>
    </div>
    
    <div class="job-postings" id="job-postings">
        <?php
        // Database connection
        $conn = new mysqli("localhost", "root", "", "job_portal");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch job postings
        $sql = "SELECT location, job_type, salary, company_name, qualification, email FROM job_postings ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='job-posting'>";
                echo "<h2>" . htmlspecialchars($row['job_type']) . "</h2>";
                echo "<p>Location: " . htmlspecialchars($row['location']) . "</p>";
                echo "<p>Job Type: " . htmlspecialchars($row['job_type']) . "</p>";
                echo "<p>Salary: " . htmlspecialchars($row['salary']) . "</p>";
                echo "<p>Company: " . htmlspecialchars($row['company_name']) . "</p>";
                echo "<p>Qualification: " . htmlspecialchars($row['qualification']) . "</p>";
                echo "<p>Email: <a href='mailto:" . htmlspecialchars($row['email']) . "'>" . htmlspecialchars($row['email']) . "</a></p>";  // Added email with mailto link
                echo "</div>";
            }
        } else {
            echo "<p>No job postings available.</p>";
        }

        $conn->close();
        ?>
    </div>
    
    <script>
        document.querySelector('.filter-btn').addEventListener('click', function() {
            var location = document.getElementById('location').value;
            var jobType = document.getElementById('job-type').value;
            var salary = document.getElementById('salary').value;
            var company = document.getElementById('company').value.toLowerCase();
            var qualification = document.getElementById('qualification').value.toLowerCase();
            
            var jobPostings = document.querySelectorAll('.job-posting');
            jobPostings.forEach(function(jobPosting) {
                var locationMatch = location === "" || jobPosting.querySelector('p:nth-child(2)').textContent.includes(location);
                var jobTypeMatch = jobType === "" || jobPosting.querySelector('p:nth-child(3)').textContent.includes(jobType);
                var salaryMatch = salary === "" || jobPosting.querySelector('p:nth-child(4)').textContent.includes(salary);
                var companyMatch = company === "" || jobPosting.querySelector('p:nth-child(5)').textContent.toLowerCase().includes(company);
                var qualificationMatch = qualification === "" || jobPosting.querySelector('p:nth-child(6)').textContent.toLowerCase().includes(qualification);
                
                if (locationMatch && jobTypeMatch && salaryMatch && companyMatch && qualificationMatch) {
                    jobPosting.style.display = 'block';
                } else {
                    jobPosting.style.display = 'none';
                }
            });
        });
    </script>

</body>
</html>
