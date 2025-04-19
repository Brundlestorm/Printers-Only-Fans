<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "octoprint", "Downloadmore1", "timelapse_db");
if ($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed.";
    header("Location: registration.php");
    exit();
}

// Handle POST submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $address = trim($_POST['address']);
    $printSuggestion = trim($_POST['print-suggestion']);

if (empty($email) || empty($password) || empty($confirmPassword)) {
    $_SESSION['error'] = "Please fill in all required fields.";
    header("Location: registrationpage.php");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Invalid email format.";
    header("Location: registrationpage.php");
    exit();
}

if ($password !== $confirmPassword) {
    $_SESSION['error'] = "Passwords do not match.";
    header("Location: registrationpage.php");
    exit();
}

// Passed all validation — continue
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (email, password, address, print_suggestion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $hashedPassword, $address, $printSuggestion);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful!";
        } else {
            if (strpos($stmt->error, 'Duplicate entry') !== false) {
                $_SESSION['error'] = "That email is already registered.";
            } else {
                $_SESSION['error'] = "Database error: " . $stmt->error;
            }
        }

        $stmt->close();
    }


$conn->close();
header("Location: registrationpage.php");
exit();
