<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tiffin_service";

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
