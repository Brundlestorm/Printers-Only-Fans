<!DOCTYPE html>
<?php include 'header.php'; ?>
       

    <section class="flex justify-center items-center">
    <video class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4" loop autoplay playsinline muted>
        <source src="logo.mp4" type="video/mp4">
        <img src="logo.png" alt="Printers Only Fans Logo" class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4">
    </video>
</section>


<main class="flex flex-col items-center justify-center min-h-screen p-4 text-center">
        <img src="cowboy.png" alt="Hot Cowboy" class="max-w-sm mx-auto" />
        <h1 class="text-4xl font-bold mb-4">Woah there, partner!</h1>
        <p class="text-lg mb-4">Looks like you've stumbled upon our cowboy by mistake. This ain't the page you were lookin' for, but since you're here, why not enjoy the view? He doesn't mind the company.</p>
        <div>
            <button onclick="window.location.href='homepage.php';" class="bg-zinc-800 text-white py-2 px-4 rounded hover:bg-zinc-700 transition duration-200 ease-in-out mb-4">Mosey on back to the Homepage</button>
            <button onclick="alert('Just kidding, there\'s nowhere to stay! Head on back home, partner.');" class="bg-zinc-800 text-white py-2 px-4 rounded hover:bg-zinc-700 transition duration-200 ease-in-out">Stay with the Cowboy</button>
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
