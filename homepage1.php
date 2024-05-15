<?php include 'header.php'; ?>
   
<script>
document.addEventListener("DOMContentLoaded", function() {
  const checkPrinterStatus = () => {
    fetch('http://your-octoprint-server/api/printer', {
      headers: {
        'X-Api-Key': '5192AAC245424DCBA64E565E21450CDF'
      }
    })
    .then(response => response.json())
    .then(data => {
      const liveFeedButton = document.getElementById('liveFeedButton');
      if (!data.state.flags.operational) {
        liveFeedButton.onclick = function() {
          window.location.href = '/our_apologies.php';  // Redirect to maintenance page
        };
        liveFeedButton.innerText = 'Check Back Soon';
      } else {
        liveFeedButton.href = '/webcam1';  // Link to live stream
        liveFeedButton.innerText = 'Live Stream';
      }
    })
    .catch(error => console.error('Error fetching printer status:', error));
  };

  // Check the printer status immediately and then every 5 minutes
  checkPrinterStatus();
  setInterval(checkPrinterStatus, 300000); // 300000 ms = 5 minutes
});
</script>

<section class="flex justify-center items-center">
    <video class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4" loop autoplay playsinline muted>
        <source src="logo.mp4" type="video/mp4">
        <img src="logo.png" alt="Printers Only Fans Logo" class="w-48 h-48 rounded-full border-4 border-zinc-400 ml-4 mt-4">
    </video>
</section>

<main class="container mx-auto my-8 mt-36 flex flex-row items-center justify-center container-mobile">
    <a id="liveFeedButton" class="card-button card-button-mobile hover-effect mr-4">Live Stream</a>
    <a href="videolibrary" class="card-button card-button-mobile hover-effect">Download Library</a>
</main>

<?php include 'footer.php'; ?>
</body>
</html>

