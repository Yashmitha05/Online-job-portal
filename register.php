<?php
session_start(); // Start the session to use session variables
include 'db.php';

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Initialize error message
$error_message = "";

if (isset($_POST['login'])) {
    // User Login
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    // Check if email is valid
    if (!is_valid_email($email)) {
        $error_message = "Invalid email format!";
    } else {
        // Query to check if user exists
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Check if password matches
            if (password_verify($password, $user['password'])) {
                // Store user info in session after successful login
                $_SESSION['user_id'] = $user['id']; // Store user ID in session
                $_SESSION['username'] = $user['username']; // Optionally store username

                // Redirect to homepage.php after successful login
                header("Location: homepage.php");
                exit();
            } else {
                // Invalid password
                $error_message = "Invalid password!";
            }
        } else {
            // No user found with that email
            $error_message = "No user found with that email!";
        }
    }
}

// If there is an error, display it below the form (using echo for error message)
if (!empty($error_message)) {
    echo "<p style='color: red; font-weight: bold;'>" . $error_message . "</p>";
}

// Signup functionality
if (isset($_POST['signup'])) {
    $username = $_POST['txt'];  // Get username
    $email = $_POST['email'];   // Get email
    $password = $_POST['pswd']; // Get password

    // Validate email format
    if (!is_valid_email($email)) {
        echo "<script>
                var demoDiv = document.createElement('div');
                demoDiv.id = 'demo';
                demoDiv.innerHTML = 'Invalid email format.';
                document.body.appendChild(demoDiv);
              </script>";
        exit();
    }

    // Check if any field is empty
    if (empty($username) || empty($email) || empty($password)) {
        echo "<script>
                var demoDiv = document.createElement('div');
                demoDiv.id = 'demo';
                demoDiv.innerHTML = 'Please fill in all fields.';
                document.body.appendChild(demoDiv);
              </script>";
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
                var demoDiv = document.createElement('div');
                demoDiv.id = 'demo';
                demoDiv.innerHTML = 'Email Address Already Exists!';
                document.body.appendChild(demoDiv);
              </script>";
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user (storing password securely)
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            // If data is successfully inserted, redirect to the login page
            header("Location: log.php");  // Redirect to the same page
            exit();
        } else {
            // If insertion fails, show an error
            echo "<script>
                    var demoDiv = document.createElement('div');
                    demoDiv.id = 'demo';
                    demoDiv.innerHTML = 'An error occurred during signup!';
                    document.body.appendChild(demoDiv);
                  </script>";
        }
    }
}

// Close the connection
$conn->close();
?>
