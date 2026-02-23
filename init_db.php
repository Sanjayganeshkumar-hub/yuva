<?php
include "db.php";

echo "<h1>Database initialization started...</h1>";

$sql = file_get_contents("database.sql");

// Remove comments and split into individual queries
$sql = preg_replace('/--.*$/m', '', $sql);
$queries = array_filter(array_map('trim', explode(';', $sql)));

$count = 0;
foreach ($queries as $query) {
    if (empty($query)) continue;
    try {
        $conn->exec($query);
        echo "<p style='color:green;'>Executed: " . htmlspecialchars(substr($query, 0, 50)) . "...</p>";
        $count++;
    } catch(PDOException $e) {
        echo "<p style='color:red;'>Error executing query: " . $e->getMessage() . "</p>";
    }
}

echo "<h2>Initialized $count queries successfully.</h2>";
echo "<a href='index.php'>Go to App</a>";
?>
