<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printers Only Fans</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body class="bg-zinc-950 text-white font-sans">
    <div class="relative">
        <header class="bg-zinc-800">
            <nav class="py-4 flex justify-end items-center container mx-auto">
                <div class="space-x-4 mr-4">
                <a href="index.html" class="hover:text-zinc-300 hover-effect">Home</a>
                    <a href="#" class="hover:text-zinc-300 hover-effect">Features</a>
                    <a href="#" class="hover:text-zinc-300 hover-effect">Pricing</a>
                    <a href="#" class="hover:text-zinc-300 hover-effect">Contact</a>
                </div>
            </nav>
        </header>
       
    </div>
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
 
    


    <footer class="py-2 bg-zinc-800">
        <div class="container mx-auto text-center container-mobile">
            <div class="custom-banner mb-2">
                <p class="text-sm">60% of all proceeds are donated to St. Jude Children's Research Hospital in the name of 1728Studios LLC.</p>
                <p class="text-sm">If you prefer to donate directly, please visit their official site:</p>
                <a href="https://www.stjude.org" target="_blank" class="text-blue-400 hover:text-blue-300 text-sm">stjude.org</a>
            </div>
            <div class="footer-links space-x-2 mb-2">
                <a href="https://www.1728studios.com/about" target="_blank" class="hover:text-zinc-300 hover-effect text-sm">About</a>
            </div>
            <p class="text-sm">© Printers Only Fans Brought to you by 1728studios.com</p>
        </div>
    </footer>
</body>
</html>

