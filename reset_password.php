<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printers Only Fans</title>
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
        }
        footer {
            background-color: #444;
            color: white;
            padding: 1em;
            text-align: center;
        }
        .custom-banner {
            margin-bottom: 1em;
        }
        .footer-links a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            display: inline-block;
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
        <div class="password-reset-form">
            <form action="update_password.php" method="post">
                <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>
                <label for="confirm-password">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <button type="submit">Reset Password</button>
            </form>
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
