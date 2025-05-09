<?php
session_start(); // Start the session

// Check if the user is not signed in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the sign-in page
    header("Location: signin");
    exit;
}

?>

<?php include 'header.php'; ?>

<section class="flex justify-center items-center">
    <video class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4" loop autoplay playsinline muted>
        <source src="logo.mp4" type="video/mp4">
        <img src="logo.png" alt="Printers Only Fans Logo" class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4">
    </video>
</section>

<main class="flex flex-wrap justify-center">
    <?php
    $servername = "localhost";
    $username = "octoprint";
    $password = "Downloadmore1";
    $dbname = "timelapse_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT filename, filepath FROM videos ORDER BY filename"; // Add ORDER BY clause to alphabetize by filename
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='w-1/5 p-2'>";
            echo "<a href='serve_file?file=" . urlencode($row["filename"]) . "'>" . htmlspecialchars($row["filename"]) . "</a>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    $stmt->close();
    $conn->close();
    ?>
</main>

<?php include 'footer.php'; ?>
</body>
</html>

