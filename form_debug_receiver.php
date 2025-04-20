<?php
echo "<h2>Received Data:</h2>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Form was not submitted via POST!";
} else if (empty($_POST)) {
    echo "POST request received but empty.";
} else {
    echo "POST received and contains values.";
}
?>
