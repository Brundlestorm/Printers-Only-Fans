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


    <main class="flex flex-col items-center justify-center min-h-screen p-4">
        <h3 class="text-2xl mb-4">This is where the magic happens</h3>
        <div class="youtube-live-stream w-full max-w-4xl">
            <!-- Use padding-bottom to create the 16:9 aspect ratio -->
            <div style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src= "https://www.youtube.com/embed/qXmUAfif0wU?si=tsbOyOapelntmQNy" title="Printers Only Live Stream" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
        <h3 class="text-1xl mb-4">Background Art Donated by JLMoney84</h3>
    </main>
    
    



    <?php include 'footer.php'; ?>
</body>
</html>
