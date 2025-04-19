<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Suppressed debug logging
@file_put_contents("/var/www/printersonly/debug_register.log", "Script started\n", FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    @file_put_contents("/var/www/printersonly/debug_register.log", "POST request received\n", FILE_APPEND);
    @file_put_contents("/var/www/printersonly/debug_register.log", print_r($_POST, true), FILE_APPEND);

    // DB config
    $servername = "localhost";
    $username = "octoprint";
    $password = "Downloadmore1";
    $dbname = "timelapse_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Sanitize input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';
    $address = filter_var($_POST['address'] ?? '', FILTER_SANITIZE_STRING);
    $printSuggestion = filter_var($_POST['print-suggestion'] ?? '', FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email.";
        exit;
    }

    // Password check
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    // Check for existing email
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email already registered.";
        exit;
    }

    $stmt->close();

    // Hash and insert
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (email, password, address, print_suggestion) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $hashedPassword, $address, $printSuggestion);

    if ($stmt->execute()) {
        echo "User registered successfully!";
        // header("Location: homepage"); // Uncomment when homepage is ready
    } else {
        echo "Failed to register user: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "This script only handles POST requests.";
}
?>
