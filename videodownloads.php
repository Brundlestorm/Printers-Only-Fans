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

<style>
    /* Updated CSS to target the <a> tags */
    main a {
        border: 2px solid #ccc;
        padding: 8px; /* Reduced padding */
        display: block; /* Ensure each link is on a separate line */
        text-align: center;
        margin: 5px;
        font-size: 14px; /* Reduced font size */
    }

    /* Adjusted grid gap */
    main {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 5px 5px; /* Reduced vertical gap by half */
        padding: 5px; /* Reduced padding */
    }
</style>

<section class="flex justify-center items-center">
    <video class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4" loop autoplay playsinline muted>
        <source src="logo.mp4" type="video/mp4">
        <img src="logo.png" alt="Printers Only Fans Logo" class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4">
    </video>
</section>

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

    $sql = "SELECT filename, filepath FROM videos ORDER BY filename"; // Add ORDER BY clause to alphabetize by filename
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $filename = pathinfo($row["filename"], PATHINFO_FILENAME); // Extract filename without extension
            echo "<div class='grid-item'>"; // Adding class for grid item
            echo "<a href='serve_file?file=" . urlencode($row["filename"]) . "'>" . htmlspecialchars($filename) . "</a>";
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




