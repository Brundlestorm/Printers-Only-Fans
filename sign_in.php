<?php
session_start(); // Start the session

// Database credentials
$servername = "localhost";
$username = "octoprint";
$password = "Downloadmore1";
$dbname = "timelapse_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;

            // Redirect to main page or dashboard
            header("Location: homepage.php");
            exit;
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: signin.php");
            exit;
        }
    } else {
        // No user found
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: signin.php");
        exit;
    }

    $stmt->close();
}

$conn->close();
?>

