<?php
// ... Include database connection ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    // ... Database query ...

    if ($emailExists) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));

        // Store the token in the database against the user
        // ... Database query to store token ...

        // Send the email with the reset link
        $resetLink = "https://yourdomain.com/reset_password?token=" . $token;
        $subject = "Password Reset Request";
        $body = "Please click on the following link to reset your password: " . $resetLink;
        // ... Send email logic ...

        echo "A password reset link has been sent to your email.";
    } else {
        echo "Email does not exist in our records.";
    }
}
?>

