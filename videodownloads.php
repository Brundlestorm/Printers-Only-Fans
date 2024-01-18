<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Downloads</title>
    <style>
        /* Your existing CSS styles */
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
        $password = "Downloadmore1";
        $dbname = "timelapse_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

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
                echo "<li><a href='serve_file.php?file=" . urlencode($row["filename"]) . "'>" . htmlspecialchars($row["filename"]) . "</a></li>";
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
        <!-- Your existing footer content -->
    </footer>
</body>
</html>

