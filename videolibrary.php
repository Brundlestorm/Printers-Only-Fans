<?php
session_start(); // Start the session

// Check if the user is not signed in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the sign-in page
    header("Location: signin.php");
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


    <main class="flex flex-col items-center justify-center min-h-screen">
    <p class="text-lg text-black mb-4">Browse our Wonderous Wares:</p>
    <a href="videodownloads.php" class="text-white bg-black px-4 py-2 rounded border-2 border-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-300">Video Downloads</a>
</main>


<?php include 'footer.php'; ?>
</body>
</html>
