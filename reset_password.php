<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Printers Only Fans</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<body class="bg-zinc-950 text-white font-sans">
    <canvas id="myCanvas"></canvas>
    <div class="relative">
        <header class="bg-zinc-800">
            <nav class="py-4 flex justify-end items-center container mx-auto">
                <div class="space-x-4 mr-4">
                <a href="homepage.html" class="hover:text-zinc-300 hover-effect">Home</a>
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


     <main class="flex items-center justify-center min-h-screen">
    <div class="password-reset-form w-full max-w-md mx-auto">
        <form action="update_password.php" method="post" class="bg-black p-6 rounded-lg shadow-lg">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            
            <div class="mb-6">
                <label for="password" class="block text-white text-lg mb-2">New Password:</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <div class="mb-6">
                <label for="confirm-password" class="block text-white text-lg mb-2">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </div>

            <button type="submit" class="w-full py-3 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline">Reset Password</button>
        </form>
    </div>
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
    <script src='background.js'></script>
</body>
</html>
