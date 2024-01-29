<?php include 'header'; ?>


    <section class="flex justify-center items-center">
    <video class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4" loop autoplay playsinline muted>
        <source src="logo.mp4" type="video/mp4">
        <img src="logo.png" alt="Printers Only Fans Logo" class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4">
    </video>
</section>


     <main class="flex items-center justify-center min-h-screen">
    <div class="password-reset-form w-full max-w-md mx-auto">
        <form action="update_password" method="post" class="bg-black p-6 rounded-lg shadow-lg">
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


<?php include 'footer'; ?>
</body>
</html>
