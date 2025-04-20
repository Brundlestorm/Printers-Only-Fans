<?php
echo "<h2>Received Data:</h2>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<p style='color: red;'>Form was not submitted via POST!</p>";
} elseif (empty($_POST)) {
    echo "<p style='color: red;'>POST is empty!</p>";
} else {
    echo "<p style='color: green;'>POST received with data!</p>";
}
?>
