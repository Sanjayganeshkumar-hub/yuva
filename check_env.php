<?php
echo "<h1>PHP Environment Check</h1>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

$conn = mysqli_connect("localhost", "root", "");
if ($conn) {
    echo "<p style='color:green;'>MySQL Connection Successful!</p>";
    mysqli_close($conn);
} else {
    echo "<p style='color:red;'>MySQL Connection Failed: " . mysqli_connect_error() . "</p>";
}
?>
