<?php
session_start(); // Start the session

// Check if the user is signed in
if (isset($_SESSION['user_id'])) {
    // Redirect to homepage
    header("Location: homepage");
    exit;
}
?>

<?php include 'header'; ?>


    <section class="flex justify-center items-center">
    <video class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4" loop autoplay playsinline muted>
        <source src="logo.mp4" type="video/mp4">
        <img src="logo.png" alt="Printers Only Fans Logo" class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4">
    </video>
</section>


    <main class="flex items-center justify-center min-h-screen">
        <div class="sign-in-form w-full max-w-md mx-auto">
            <form action="sign_in" method="post" class="bg-black p-6 rounded-lg shadow-lg">
                <div class="mb-6">
                    <input type="email" id="email" name="email" placeholder="Email Address" required class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white placeholder-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                </div>
    
                <div class="mb-6">
                    <input type="password" id="password" name="password" placeholder="Password" required class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white placeholder-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                </div>
    
                <button type="submit" class="w-full py-3 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline">Sign In</button>
    
                <div class="password-reset-link text-center mt-4">
                    <a href="reset_password" class="text-blue-300 hover:text-blue-500">Forgot Password?</a>
                    <p class="text-white text-sm mt-2">"It's ok, we all forget sometimes"</p>
                </div>
            </form>
        </div>
    </main>
    

    <?php include 'footer'; ?>
</body>
</html>


 
