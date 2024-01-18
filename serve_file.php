<?php
session_start();

// Authentication and authorization check
// Ensure the user has the right to access the files

$filename = $_GET['file'];

$servername = "localhost";
$username = "octoprint";
$password = "Downloadmore1";
$dbname = "timelapse_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT filepath FROM videos WHERE filename = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $filename);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $filepath = $row['filepath'];

    if (file_exists($filepath)) {
        header('Content-Type: ' . mime_content_type($filepath));
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        readfile($filepath);
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid file request.";
}

$stmt->close();
$conn->close();
?>

