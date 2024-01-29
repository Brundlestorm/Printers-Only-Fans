<?php
session_start(); // Start the session

// Check if the user is signed in
if (isset($_SESSION['user_id'])) {
    // Redirect to homepage.html
    header("Location: homepage.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Printers Only Fans</title>
    <link rel="stylesheet" href="index.css">
    <!-- Include Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <!-- Your custom styles for positioning the canvas -->
    <style>
        #myCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        /* Add any additional custom styles here */
    </style>
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

    
    
    
    
    <main class="container mx-auto my-8 mt-14 flex flex-wrap justify-between items-center container-mobile">
        <section class="w-full md:w-1/3 p-4 card" style="border: 2px solid white; border-radius: 8px;">
            <h1 class="text-3xl font-bold mb-4">Member Access</h1>
            <a href="signin.php" class="bg-black text-white border-none rounded-full px-5 py-2 mb-4 transition-colors duration-300 ease-linear hover:bg-gray-800 inline-block text-center">Sign In</a>
            <p class="mt-4">Not a member yet?</p>
            <a href="registrationpage.php" class="text-blue-400 hover:text-blue-300">Register here</a>
        </section>
        
        
        <section class="w-full md:w-1/3 p-4 card" style="border: 2px solid white; border-radius: 8px;">
            <h2 class="text-3xl font-bold mb-4">Donation</h2>
            <p>60% of all proceeds are donated to St. Jude Children's Research Hospital in the name of 1728Studios LLC.</p>
            <p class="text-sm">If you prefer to donate directly, please visit their official site:</p>
            <a href="https://www.stjude.org" target="_blank" class="text-blue-400 hover:text-blue-300 text-sm">stjude.org</a>
        </section>
        

        


    </main>
    <footer class="py-4 bg-zinc-800">
        <div class="container mx-auto text-center container-mobile">
            <p>© Printers Only Fans Brought to you by 1728studios.com</p>
            <a href="https://www.1728studios.com/about" target="_blank" class="text-blue-400 hover:text-blue-300">About</a>
        </div>
    </footer>

    <script>
       let scene, camera, renderer;
let shapes = []; // Array to hold multiple shapes

function init() {
  scene = new THREE.Scene();
  camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 500);
  renderer = new THREE.WebGLRenderer({ canvas: document.getElementById('myCanvas'), antialias: true });
  renderer.setSize(window.innerWidth, window.innerHeight);
  document.body.appendChild(renderer.domElement);

  // Create random shapes with even larger size
  for (let i = 0; i < 20; i++) {
    let geometry;
    let scale = Math.random() * 10 + 10; // Further increase the scale for bigger shapes
    switch (Math.floor(Math.random() * 3)) {
      case 0:
        geometry = new THREE.BoxGeometry().scale(scale, scale, scale);
        break;
      case 1:
        geometry = new THREE.SphereGeometry(1, 6, 6).scale(scale, scale, scale);
        break;
      case 2:
        geometry = new THREE.DodecahedronGeometry().scale(scale, scale, scale);
        break;
    }

    const edges = new THREE.EdgesGeometry(geometry);
    // LineBasicMaterial with thinner lines and less opacity
    const lineMaterial = new THREE.LineBasicMaterial({ color: 0xf14900, linewidth: .5, opacity: 0.2, transparent: true });
    const line = new THREE.LineSegments(edges, lineMaterial);
    line.position.x = (Math.random() - 0.5) * 400;
    line.position.y = (Math.random() - 0.5) * 400;
    line.position.z = (Math.random() - 0.5) * 400;
    line.rotation.x = Math.random() * 2 * Math.PI;
    line.rotation.y = Math.random() * 2 * Math.PI;
    shapes.push(line);
    scene.add(line);
  }

  camera.position.z = 250;
  animate();
}

function animate() {
  requestAnimationFrame(animate);
  shapes.forEach((shape) => {
    shape.rotation.x += 0.01;
    shape.rotation.y += 0.01;
  });
  renderer.render(scene, camera);
}

function onWindowResize() {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
}

window.addEventListener('resize', onWindowResize, false);

init();

      </script>
</body>
</html>
