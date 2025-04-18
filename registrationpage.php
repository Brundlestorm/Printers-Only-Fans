<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';

// Clear session messages after displaying them
unset($_SESSION['error']);
unset($_SESSION['success']);
?>

<?php include 'header.php'; ?>

<section class="flex justify-center items-center">
    <video class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4" loop autoplay playsinline muted>
        <source src="logo.mp4" type="video/mp4">
        <img src="logo.png" alt="Printers Only Fans Logo" class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4">
    </video>
</section>

<main class="container mx-auto my-8 mt-48 flex flex-col items-center justify-center">
    <?php if (!empty($error)): ?>
        <div class="text-red-500 font-bold mb-4"><?php echo $error; ?></div>
    <?php elseif (!empty($success)): ?>
        <div class="text-green-500 font-bold mb-4"><?php echo $success; ?></div>
    <?php endif; ?>

    <form class="w-full max-w-md bg-black p-6 rounded-lg shadow-lg" method="POST" action="register_user.php">
        <div class="mb-6">
            <label for="email" class="block text-white text-lg mb-2">Username (Email):</label>
            <input type="email" id="email" name="email" placeholder="Email Address" required
                   class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-white text-lg mb-2">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required
                   class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        </div>

        <div class="mb-6">
            <label for="confirm-password" class="block text-white text-lg mb-2">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required
                   class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        </div>

        <div class="mb-6">
            <label for="address" class="block text-white text-lg mb-2">Address (Optional):</label>
            <input type="text" id="address" name="address" placeholder="Address"
                   class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        </div>

        <div class="mb-6">
            <label for="print-suggestion" class="block text-white text-lg mb-2">Print Suggestion:</label>
            <input type="text" id="print-suggestion" name="print-suggestion" placeholder="Suggest a print!"
                   class="w-full px-4 py-3 rounded border-2 border-white bg-black text-white focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        </div>

        <button type="submit"
                class="w-full py-3 mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline">
            Register
        </button>
    </form>

    <div class="mt-4 p-4 rounded-lg text-white bg-black hover:bg-gray-900 transition-colors duration-300 ease-in-out">
        <p class="text-lg">If we pick your print, we will mail it to you at no charge.</p>
    </div>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
