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

document.addEventListener('DOMContentLoaded', init);

init();
