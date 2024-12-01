<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Job Posting</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<style>
    /* Styling for the Employer Job Posting page */

    body {
        background-color: #3E1C6B; /* Royal Purple */
        color: #fff;
        font-family: 'Roboto', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .employer-form {
        width: 100%;
        max-width: 500px;
        background-color: #6A4C9C; /* Softer Purple */
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .employer-form h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: #F1C40F; /* Gold accent */
        margin-bottom: 1.5rem;
    }

    .employer-form input {
        width: 100%;
        padding: 0.8rem;
        margin: 0.8rem 0;
        font-size: 1rem;
        border: 1px solid #8E44AD; /* Elegant purple border */
        border-radius: 8px;
        background-color: #f4f4f4;
        color: #333;
        font-family: 'Roboto', sans-serif;
    }

    .employer-form button {
        width: 100%;
        padding: 1rem;
        font-size: 1.2rem;
        font-weight: bold;
        color: #fff;
        background-color: #8E44AD; /* Elegant Purple */
        border: none;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 1.2rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .employer-form button:hover {
        background-color: #9B59B6; /* Slightly softer purple */
        transform: translateY(-3px);
    }

    .success-message {
        display: none;
        color: #2ECC71; /* Success Green */
        font-weight: bold;
        margin-top: 1rem;
    }
</style>
<body>

<div class="employer-form">
    <h2>Post a Job</h2>
    
    <form id="jobForm" action="submit_job.php" method="POST">
        <input type="text" id="location" name="location" placeholder="Location" required>
        <input type="text" id="jobType" name="jobType" placeholder="Job Type" required>
        <input type="text" id="salary" name="salary" placeholder="Salary" required>
        <input type="text" id="companyName" name="companyName" placeholder="Company Name" required>
        <input type="text" id="qualification" name="qualification" placeholder="Required Qualification" required>
        <!-- New input field for "E-mail to Apply" -->
        <input type="email" id="email" name="email" placeholder="E-mail to Apply" required>
        <button type="button" onclick="applyJob()">Submit</button>
        <p class="success-message" id="successMessage">Submitted successfully!</p>
    </form>
</div>

<script>
    async function applyJob() {
        // Collect form data
        const formData = new FormData(document.getElementById("jobForm"));

        // Send data to submit_job.php
        const response = await fetch('submit_job.php', {
            method: 'POST',
            body: formData
        });

        // Display success or error message
        const result = await response.text();
        alert(result);

        // Show success message and reset form if successful
        if (response.ok) {
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('jobForm').reset();
        }
    }
</script>

</body>
</html>
