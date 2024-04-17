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
    <div class="text-center mt-8 mx-auto max-w-2xl">
        <h2 class="text-3xl font-bold mb-4">A word about downloads</h2>
        <p class="text-lg text-yellow-500">
            ""Welcome to the peculiar realm of Printers Only Fans, where the mundane meets the bizarre in a delightful dance of 3-D printing escapades. Here, amidst the tangled web of filament and the occasional intrusion of ill-placed supports, you'll find a treasure trove of raw footage straight from the belly of the printer.

For a mere $0.99 per download, you'll gain access to these unfiltered glimpses of printer magic—complete with wonky lighting, unwelcome supports, and even the occasional cameo appearance of a human arm. It's not premium content, mind you, but rather a whimsical journey into the unpredictable world of hobbyist printing.

This isn't your typical instructional guide or polished showcase. No, this is a celebration of imperfection, a testament to the joy of tinkering, and a reminder that sometimes the most delightful discoveries come from embracing the unexpected.

So join us, fellow adventurers, as we embark on this lighthearted romp through the quirky corners of 3-D printing. Together, let's revel in the joy of creativity, chuckle at the absurdity of it all, and perhaps, just perhaps, find a moment of whimsy in the most unexpected of places.""
        </p>
    </div>
    <div class="mt-8">
        <a href="videodownloads" class="text-white bg-black px-4 py-2 rounded border-2 border-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-300">Video Downloads</a>
    </div>
</main>


<?php include 'footer.php'; ?>
</body>
</html>


