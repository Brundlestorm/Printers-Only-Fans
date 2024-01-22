<?php
session_start(); // Start the session

// You can check for session variables here and display messages if set
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
?>


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
                    <a href="#" class="hover:text-zinc-300 hover-effect">Home</a>
                    <a href="#" class="hover:text-zinc-300 hover-effect">Features</a>
                    <a href="#" class="hover:text-zinc-300 hover-effect">Pricing</a>
                    <a href="#" class="hover:text-zinc-300 hover-effect">Contact</a>
                </div>
            </nav>
        </header>
       
    </div>
    <section class="flex justify-center items-center">
        <img src="logo.png" alt="Printers Only Fans Logo" class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4">
    </section>
    

    <main class="container mx-auto my-8 mt-48 flex flex-col items-center justify-center">
        <form class="w-full max-w-md bg-black p-6 rounded-lg shadow-lg">
            <div class="mb-6">
                <label for="email" class="block text-white text-lg mb-2">Username (Email):</label>
                <input type="email" id="email" name="email" placeholder="Email Address" required class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </div>
    
            <div class="mb-6">
                <label for="password" class="block text-white text-lg mb-2">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </div>
    
            <div class="mb-6">
                <label for="confirm-password" class="block text-white text-lg mb-2">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </div>
    
            <div class="mb-6">
                <label for="address" class="block text-white text-lg mb-2">Address (Optional):</label>
                <input type="text" id="address" name="address" placeholder="Address" class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </div>
    
            <div class="mb-6">
                <label for="print-suggestion" class="block text-white text-lg mb-2">Print Suggestion:</label>
                <input type="text" id="print-suggestion" name="print-suggestion" placeholder="Suggest a print!" class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            </div>
    
            <button type="submit" class="w-full py-3 mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline">Register</button>
        </form>
    
        <div class="mt-4 p-4 rounded-lg text-white bg-black hover:bg-gray-900 transition-colors duration-300 ease-in-out">
            <p class="text-lg">If we pick your print, we will mail it to you at no charge.</p>
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
</body>
</html>
