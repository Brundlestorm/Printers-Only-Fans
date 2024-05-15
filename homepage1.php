document.addEventListener("DOMContentLoaded", function() {
  const checkPrinterStatus = () => {
    console.log("Fetching printer status...");
    fetch('http://10.0.0.19/api/printer', {
      headers: {
        'X-Api-Key': '5192AAC245424DCBA64E565E21450CDF'
      }
    })
    .then(response => {
      console.log("API response received");
      return response.json();
    })
    .then(data => {
      console.log("Data parsed:", data);
      const liveFeedButton = document.getElementById('liveFeedButton');
      if (!data.state.flags.operational) {
        liveFeedButton.onclick = function() {
          window.location.href = '/our_apologies.php';
        };
        liveFeedButton.innerText = 'Check Back Soon';
      } else {
        liveFeedButton.setAttribute('href', '/webcam1');
        liveFeedButton.innerText = 'Live Stream';
      }
    })
    .catch(error => {
      console.error('Error fetching printer status:', error);
      console.error(error);
    });
  };

  checkPrinterStatus();
  setInterval(checkPrinterStatus, 300000); // 300000 ms = 5 minutes
});


