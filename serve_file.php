<?php
session_start();

// Authentication and authorization check
// Ensure the user has the right to access the files

$filename = $_GET['file'];

// Locate the file on the server
// This could involve querying the database to get the file path
// For example, you might have a function getFilepath($filename) that returns the actual file path

$filepath = getFilepath($filename);

// Serve the file
if (file_exists($filepath)) {
    header('Content-Type: ' . mime_content_type($filepath));
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    readfile($filepath);
    exit;
} else {
    echo "File not found.";
}
?>
