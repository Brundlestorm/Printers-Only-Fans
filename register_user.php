<?php
session_start(); // Start the session to use session variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Sanitize and validate user input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format";
        header("Location: registrationpage.php"); // Redirect back to registration page
        exit;
    }

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $printSuggestion = filter_var($_POST['print-suggestion'], FILTER_SANITIZE_STRING);

    // Password validation
    if ($password != $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match. May want to try that one again.";
        header("Location: registrationpage.php");
        exit;
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Email already registered. Please use a different email.";
        header("Location: registrationpage.php");
        exit;
    }
    $stmt->close();

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user
    $stmt = $conn->prepare("INSERT INTO users (email, password, address, print_suggestion) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $hashedPassword, $address, $printSuggestion);
    if ($stmt->execute()) {
        $_SESSION['success'] = "Thank you for your submission. We believe every child should have a chance.";
        header("Location: homepage.php"); // Redirect to main page
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: registrationpage.php");
    }

    $stmt->close();
    $conn->close();
}
?>
