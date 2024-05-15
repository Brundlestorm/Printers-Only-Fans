<?php include 'header.php'; ?>
   
<script>
document.addEventListener("DOMContentLoaded", function() {
  const checkPrinterStatus = () => {
    fetch('http://10.0.0.19/api/printer', {
      headers: {
        'X-Api-Key': 'E969BA879E504CDCB183A6FF5E405FE0'
      }
    })
    .then(response => {
      if (!response.ok) throw new Error('Network response was not ok');
      return response.json();
    })
    .then(data => {
      const liveFeedButton = document.getElementById('liveFeedButton');
      if (!data.state.flags.operational) {
        liveFeedButton.onclick = function() {
          window.location.href = '/our_apologies.php';
        };
        liveFeedButton.innerText = 'Check Back Soon';
      } else {
        liveFeedButton.href = '/webcam1';
        liveFeedButton.innerText = 'Live Stream';
      }
    })
    .catch(error => {
      console.error('Error fetching printer status:', error);
      const liveFeedButton = document.getElementById('liveFeedButton');
      liveFeedButton.onclick = function() {
        window.location.href = '/our_apologies.php';
      };
      liveFeedButton.innerText = 'Check Back Soon';
    });
  };

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



