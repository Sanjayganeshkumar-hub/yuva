<?php
// Database configuration
$db_type = getenv('DB_TYPE') ?: "mysql";
$host    = getenv('DB_HOST') ?: "localhost";
$user    = getenv('DB_USER') ?: "root";
$pass    = getenv('DB_PASS') ?: "";
$db      = getenv('DB_NAME') ?: "tiffin_service";
$port    = getenv('DB_PORT') ?: ($db_type === "pgsql" ? "5432" : "3306");

try {
    if ($db_type === "pgsql") {
        $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    } else {
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    }
    
    $conn = new PDO($dsn, $user, $pass);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
