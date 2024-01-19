<?php
session_start(); // Start the session

// You can check for session variables here and display messages if set
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printers Only Fans - Registration</title>
    <style>
        /* CSS styling */
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
        }
        header { 
            background-color: #333; 
            color: white; 
            padding: 1em; 
            text-align: center; 
        }
        h1, h2 {
            margin: 0;
        }
        main {
            padding: 1em;
            text-align: center;
        }
        footer {
            background-color: #444;
            color: white;
            padding: 1em;
            text-align: center;
        }
        .custom-banner, .print-suggestion-banner {
            margin-bottom: 1em;
        }
        .footer-links a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            display: inline-block;
        }
        .registration-form {
            display: inline-block;
            text-align: left;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            padding: 5px;
            margin: 5px;
            display: block;
        }
        button[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 10px;
        }
        label {
            margin-top: 10px;
        }
        /* Additional styles can be added here */
    </style>
</head>
<body>
    <header>
        <h1>Printers Only Fans</h1>
        <h2>"We know you like to watch"</h2>
    </header>

    <main>
        <form class="registration-form" action="register_user.php" method="post">
            <label for="email">Username (Email):</label>
            <input type="email" id="email" name="email" placeholder="Email Address" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>

            <label for="address">Address (Optional):</label>
            <input type="text" id="address" name="address" placeholder="Address">

            <label for="print-suggestion">Print Suggestion:</label>
            <input type="text" id="print-suggestion" name="print-suggestion" placeholder="Suggest a print!">

            <button type="submit">Register</button>
        </form>
        <div class="print-suggestion-banner">
            <p>If we pick your print, we will mail it to you at no charge.</p>
        </div>
    </main>

    <footer>
        <div class="custom-banner">
            <p>60% of all proceeds are donated to St. Jude Children's Research Hospital in the name of 1728Studios LLC.</p>
            <p>If you prefer to donate directly, please visit their official site:</p>
            <a href="https://www.stjude.org" target="_blank">stjude.org</a>
        </div>
        <div class="footer-links">
            <a href="index.html">Home</a>
            <a href="https://www.1728studios.com/about" target="_blank">About</a>
        </div>
        <p>© Printers Only Fans Brought to you by 1728studios.com</p>
    </footer>
</body>
</html>
