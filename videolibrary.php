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
            "Welcome to Printers Only Fans, a cozy corner of the digital realm where enthusiasts gather to revel in the artistry of 3-D printing. With a nod to the playful spirit of Douglas Adams, our site embraces a touch of whimsy that's sure to bring a smile to your face.

            Conceived in jest and camaraderie, Printers Only Fans playfully pokes fun at conventions with its cheeky name. But beneath the lighthearted facade lies a heart of gold—60% of our proceeds are dedicated to supporting children's health research.

            At the heart of our digital sanctuary is a live camera feed, offering a mesmerizing glimpse into the mesmerizing world of 3-D printing. Watch as layers of filament come together to form intricate creations, all from the comfort of your screen.

            And if curiosity beckons, explore our library of downloads, where treasures of creativity await. For a small fee, these digital delights can be yours to enjoy and adorn your own digital domain.

            So come, join us in this delightful journey where whimsy and generosity intertwine. Together, let's celebrate the joy of creativity while making a difference in the world."
        </p>
    </section>
    <a href="videodownloads" class="text-white bg-black px-4 py-2 rounded border-2 border-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-300 mt-8">Video Downloads</a>
</main>


<?php include 'footer.php'; ?>
</body>
</html>


