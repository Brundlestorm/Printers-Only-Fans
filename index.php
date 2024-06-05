<?php
session_start(); // Start the session

// Check if the user is signed in
if (isset($_SESSION['user_id'])) {
    // Redirect to homepage
    header("Location: homepage");
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

    
    
    
    
    <main class="container mx-auto my-8 mt-14 flex flex-wrap justify-between items-center container-mobile">
        <section class="w-full md:w-1/3 p-4 card" style="border: 2px solid white; border-radius: 8px;">
            <h1 class="text-3xl font-bold mb-4">Member Access</h1>
            <a href="signin" class="bg-black text-white border-none rounded-full px-5 py-2 mb-4 transition-colors duration-300 ease-linear hover:bg-gray-800 inline-block text-center">Sign In</a>
            <p class="mt-4">Not a member yet?</p>
            <a href="registrationpage" class="text-blue-400 hover:text-blue-300">Register here</a>
        </section>
        
        
        
        

        


    </main>
    <footer class="py-4 bg-zinc-800">
        <div class="container mx-auto text-center container-mobile">
            <p>© Printers Only Fans Brought to you by 1728studios.com</p>
            <a href="https://www.1728studios.com/about" target="_blank" class="text-blue-400 hover:text-blue-300">About</a>
        </div>
    </footer>

    <script src='background.js'></script>
</body>
</html>
