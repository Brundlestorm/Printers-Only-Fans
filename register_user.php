<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Confirm the script is running
file_put_contents("/var/www/printersonly/debug_register.log", "Script started\n", FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    file_put_contents("/var/www/printersonly/debug_register.log", "POST request received\n", FILE_APPEND);
    file_put_contents("/var/www/printersonly/debug_register.log", print_r($_POST, true), FILE_APPEND);

    // Database credentials
    $servername = "localhost";
    $username = "octoprint";
    $password = "Downloadmore1";
    $dbname = "timelapse_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        file_put_contents("/var/www/printersonly/debug_register.log", "DB Connection failed: " . $conn->connect_error . "\n", FILE_APPEND);
        die("Database connection failed");
    }

    // Sanitize inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';
    $address = filter_var($_POST['address'] ?? '', FILTER_SANITIZE_STRING);
    $printSuggestion = filter_var($_POST['print-suggestion'] ?? '', FILTER_SANITIZE_STRING);

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        file_put_contents("/var/www/printersonly/debug_register.log", "Invalid email format: $email\n", FILE_APPEND);
        echo "Invalid email.";
        exit;
    }

    // Password check
    if ($password !== $confirmPassword) {
        file_put_contents("/var/www/printersonly/debug_register.log", "Passwords don't match\n", FILE_APPEND);
        echo "Passwords do not match.";
        exit;
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        file_put_contents("/var/www/printersonly/debug_register.log", "Email already exists\n", FILE_APPEND);
        echo "Email already registered.";
        exit;
    }

    $stmt->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password, address, print_suggestion) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $hashedPassword, $address, $printSuggestion);

    if ($stmt->execute()) {
        file_put_contents("/var/www/printersonly/debug_register.log", "Insert successful\n", FILE_APPEND);
        echo "User registered successfully!";
    } else {
        file_put_contents("/var/www/printersonly/debug_register.log", "Insert failed: " . $stmt->error . "\n", FILE_APPEND);
        echo "Failed to register user: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    file_put_contents("/var/www/printersonly/debug_register.log", "Not a POST request\n", FILE_APPEND);
    echo "This script only handles POST requests.";
}
?>
