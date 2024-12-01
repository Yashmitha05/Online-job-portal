<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireHub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Header Styling */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #4a148c; /* Purple theme */
    color: #fff;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    width: 50px; /* Set width for logo image */
    height: 50px; /* Set height for logo image */
    margin-right: 10px; /* Space between logo image and text */
}

.logo h1 {
    color: #fff;
}

/* Navigation Styling */
nav a {
    color: #fff;
    margin-left: 20px;
    text-decoration: none;
}

.signin-button {
    background-color: #8e24aa; /* Darker purple */
    padding: 10px 20px;
    border-radius: 5px;
}

/* Slider Styling */
.slider {
    position: relative;
    width: 100%;
    height: 600px;
    overflow: hidden;
}

.slide {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    background: rgba(74, 20, 140, 0.8); /* Overlay color */
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    z-index: -1;
}

.slide-text {
    text-align: center;
    max-width: 600px;
}

.slide-text h2 {
    font-size: 2.5em;
    margin-bottom: 10px;
}

.button-group button {
    padding: 10px 20px;
    margin: 10px;
    border: none;
    background-color: #ab47bc;
    color: #fff;
    border-radius: 5px;
}

/* About Section Styling */
.about-section {
    padding: 50px;
    background-color: #f3e5f5; /* Light purple background */
    color: #4a148c; /* Dark purple text color */
    text-align: center;
    margin-top: 50px;
}

.about-section h2 {
    font-size: 2em;
    margin-bottom: 20px;
}

.about-section p {
    font-size: 1.2em;
}

/* Contact Section Styling */
.contact-section {
    padding: 50px;
    background-color: #f3e5f5; /* Light purple background */
    color: #4a148c; /* Dark purple text color */
    text-align: center;
}

.contact-section h2 {
    font-size: 2em;
    margin-bottom: 20px;
}
</style>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="img.jpg" alt="HireHub Logo"> <!-- Replace with your actual logo image file -->
            <h1>HireHub</h1>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#about" class="about-link">About</a> <!-- Linking to About section -->
            <a href="#contact">Contact</a>
            <a href="log.php" class="signin-button">Sign In</a>
        </nav>
    </header>

    <!-- Slider Section -->
    <section class="slider">
        <div class="slide">
            <img src="image1.jpg" alt="Slide Image 1">
            <div class="slide-text">
                <h2>Find The Best Job That Fits You</h2>
                <p>An initiative to help graduates find jobs.</p>
                <div class="button-group">
                    <!-- Updated buttons with onclick for redirection -->
                    <button onclick="window.location.href='log.php'">Search A Job</button>
                    <button onclick="window.location.href='log.php'">Post A Job</button>
                </div>
            </div>
        </div>
        <!-- Add more slides as needed -->
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <h2>About HireHub</h2>
        <p>HireHub is an online job portal designed to connect job seekers with potential employers. Our goal is to make job searching easier and more accessible for graduates and professionals alike. We provide a platform for users to search and post job opportunities, ensuring a seamless recruitment process.</p>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <p>Email: contact@hirehub.com</p>
        <p>Address: 123 Startup Street, Tamilnadu</p>
        <p>Phone: (+91) 7852609873</p>
    </section>

    <!-- JavaScript for slider functionality -->
    <script src="script.js"></script>
</body>
</html>
