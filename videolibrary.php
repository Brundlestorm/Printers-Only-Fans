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

<main class="container mx-auto my-8 mt-36 flex flex-row items-center justify-center container-mobile">
       <section class="text-center mt-8 mx-auto max-w-2xl">
           <h2 class="text-3xl font-bold mb-4">About Our Site</h2>
          <p class="text-lg text-yellow-500">
               " Together, let's celebrate the joy of creativity while making a difference in the world."
           </p>
       </section>
 </main>


<?php include 'footer.php'; ?>
</body>
</html>
