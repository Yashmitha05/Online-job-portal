<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* styles.css */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}

body {
    background-color: #f4f4f4;
    color: #333;
}

.header {
    background-color: #3E1C6B;  /* Royal purple */
    padding: 1.5rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header .logo h1 {
    color: white;
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-weight: 700;
}

.nav-menu ul {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-menu ul li {
    position: relative;
}

.nav-menu ul li a {
    color: white;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 500;
    transition: color 0.3s ease;
}

.nav-menu ul li a:hover {
    color: #F1C40F;  /* Yellow gold */
}

.contact-info .contact-dropdown {
    display: none;
    position: absolute;
    top: 30px;
    left: 0;
    background-color: #6A4C9C;  /* Sophisticated purple */
    color: white;
    padding: 1rem;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 200px;
}

.contact-info:hover .contact-dropdown {
    display: block;
}

.search-section {
    background-color: #6A4C9C;  /* Sophisticated purple */
    padding: 3rem 1rem;
    text-align: center;
    color: white;
}

.search-section h2 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    font-family: 'Playfair Display', serif;
}

.user-buttons {
    margin-top: 1.5rem;
}

.user-buttons button {
    padding: 1rem 2rem;
    font-size: 1rem;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 10px;
    transition: transform 0.3s ease, background-color 0.3s ease;
    font-family: 'Roboto', sans-serif;
}

.jobseeker-btn {
    background-color: #34495E;  /* Dark gray-blue */
}

.employer-btn {
    background-color: #2C3E50;  /* Darker blue-gray */
}

.jobseeker-btn:hover, .employer-btn:hover {
    transform: scale(1.05);
    background-color: #5D6D7E;  /* Lighter blue-gray */
}

.popular-categories {
    padding: 2rem 1rem;
    text-align: center;
}

.popular-categories h2 {
    font-size: 2rem;
    margin-bottom: 1.5rem;
    font-family: 'Playfair Display', serif;
}

.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    padding: 0 2rem;
}

.category-card {
    background-color: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s, box-shadow 0.3s ease-in-out;
    font-family: 'Roboto', sans-serif;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    background-color: #F2F3F4;  /* Light gray background on hover */
}

.category-card:after {
    content: ' 📊'; /* Adds an icon */
    font-size: 1.5rem;
    margin-left: 10px;
}

</style>
<body>

<!-- Header with navigation -->
<div class="header">
    <div class="logo">
        <h1>Job Portal</h1>
    </div>
    <div class="nav-menu">
        <ul>
            <li><a href=frontpage.php>Home</a></li>
            <li><a href="search.php">Jobseeker</a></li> <!-- Updated to link to search.php -->
            <li><a href="#">Employer</a></li>
            <li class="contact-info">
                <a href="#">Contact Info</a>
                <div class="contact-dropdown">
                    <p>Email: support@jobportal.com</p>
                    <p>Phone: +123 456 7890</p>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="search-section">
    <h2>Search Online Jobs</h2>
    <div class="user-buttons">
        <button class="jobseeker-btn" onclick="window.location.href='search.php'">I'M A JOBSEEKER</button> <!-- Link updated to search.php -->
        <button class="employer-btn" onclick="window.location.href='employer.php'">I'M AN EMPLOYER</button>
    </div>
</div>

<div class="popular-categories">
    <h2>Popular Job Categories</h2>
    <div class="category-grid">
       <button id="digital-marketing"> <div class="category-card">Digital Marketing</div></button>
        <button id="hr"><div class="category-card">HR</div></button>
       <button id="it"> <div class="category-card">IT</div></button>
        <button id="medicine"><div class="category-card">Medicine</div></button>
       <button id="project-manager"> <div class="category-card">Product Manager</div></button>
    </div>
</div>


</body>
<script>
    document.getElementById("digital-marketing").addEventListener("click", function() {
        window.location.href = "digital-marketing.php";
    });

    document.getElementById("hr").addEventListener("click", function() {
        window.location.href = "hr.php";
    });

    document.getElementById("it").addEventListener("click", function() {
        window.location.href = "it.php";
    });

    document.getElementById("medicine").addEventListener("click", function() {
        window.location.href = "medicine.php";
    });

    document.getElementById("project-manager").addEventListener("click", function() {
        window.location.href = "project_manager.php";
    });
</script>

</html>
