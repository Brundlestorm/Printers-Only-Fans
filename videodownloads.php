<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Downloads</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        main {
            flex: 1;
            padding: 1em;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <header>
        <h1>Timelapse Videos for Download</h1>
    </header>
    <main>
        <?php
        $servername = "localhost";
        $username = "octoprint";
        $password = "Dwonloadmore1";
        $dbname = "timelapse_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT filename, filepath FROM videos";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li><a href='" . htmlspecialchars($row["filepath"]) . "'>" . htmlspecialchars($row["filename"]) . "</a></li>";
            }
            echo "</ul>";
        } else {
            echo "0 results";
        }

        $stmt->close();
        $conn->close();
        ?>
    </main>
    <footer>
        <div class="custom-banner">
            <p>60% of all proceeds are donated to St. Jude Children's Research Hospital in the name of 1728Studios LLC.</p>
            <p>If you prefer to donate directly, please visit their direct site:</p>
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
