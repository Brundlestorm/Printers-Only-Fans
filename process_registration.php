<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "octoprint", "Downloadmore1", "timelapse_db");
if ($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed.";
    header("Location: registrationpage.php");
    exit();
}

// Handle POST submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $address = trim($_POST['address']);
    $printSuggestion = trim($_POST['print-suggestion']);

    // Validation
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

    // Insert into database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, password, address, print_suggestion) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        $_SESSION['error'] = "Prepare failed: " . $conn->error;
        header("Location: registrationpage.php");
        exit();
    }

    $stmt->bind_param("ssss", $email, $hashedPassword, $address, $printSuggestion);

    if (!$stmt->execute()) {
        $_SESSION['error'] = "Execute failed: " . $stmt->error;
    } else {
        $_SESSION['success'] = "Registration successful!";
    }

    $stmt->close();
    $conn->close();

    header("Location: registrationpage.php");
    exit();
}
?>
