<?php
ob_start();
session_start();

$debug_log = __DIR__ . '/form_debug.log';  // Safe, inside the project folder
file_put_contents($debug_log, "== Form submitted ==\n", FILE_APPEND);

// Database connection
$conn = new mysqli("localhost", "octoprint", "Downloadmore1", "timelapse_db");
if ($conn->connect_error) {
    file_put_contents($debug_log, "DB connect error: " . $conn->connect_error . "\n", FILE_APPEND);
    $_SESSION['error'] = "Database connection failed.";
    header("Location: registrationpage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dump all POST data
    file_put_contents($debug_log, print_r($_POST, true), FILE_APPEND);

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';
    $address = trim($_POST['address'] ?? '');
    $printSuggestion = trim($_POST['print-suggestion'] ?? '');

    file_put_contents($debug_log, "Email: $email | Password: $password | Confirm: $confirmPassword\n", FILE_APPEND);

    // Validation
    if (empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['error'] = "Please fill in all required fields.";
        file_put_contents($debug_log, "Validation failed: empty field(s)\n", FILE_APPEND);
        header("Location: registrationpage.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        file_put_contents($debug_log, "Validation failed: invalid email\n", FILE_APPEND);
        header("Location: registrationpage.php");
        exit();
    }

    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match.";
        file_put_contents($debug_log, "Validation failed: passwords mismatch\n", FILE_APPEND);
        header("Location: registrationpage.php");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (email, password, address, print_suggestion) VALUES (?, ?, ?, ?)");

    if (!$stmt) {
        $_SESSION['error'] = "Prepare failed: " . $conn->error;
        file_put_contents($debug_log, "Prepare failed: " . $conn->error . "\n", FILE_APPEND);
        header("Location: registrationpage.php");
        exit();
    }

    $stmt->bind_param("ssss", $email, $hashedPassword, $address, $printSuggestion);

    if (!$stmt->execute()) {
        $_SESSION['error'] = "Execute failed: " . $stmt->error;
        file_put_contents($debug_log, "Execute failed: " . $stmt->error . "\n", FILE_APPEND);
    } else {
        $_SESSION['success'] = "Registration successful!";
        file_put_contents($debug_log, "Registration succeeded!\n", FILE_APPEND);
    }

    $stmt->close();
    $conn->close();

    header("Location: registrationpage.php");
    exit();
}

file_put_contents($debug_log, "No POST received\n", FILE_APPEND);
header("Location: registrationpage.php");
exit();
ob_end_flush();
?>
