<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $day = $_POST['day'];
    $meal = $_POST['meal_type'];

    try {
        $stmt = $conn->prepare("INSERT INTO selections (customer_name, day, meal_type, status) VALUES (:name, :day, :meal, 'Pending')");
        $stmt->execute(['name' => $name, 'day' => $day, 'meal' => $meal]);
        $message = "Meal Selected Successfully!";
    } catch(PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selection Status</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f7f6; }
        .card { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #3498db; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="card">
        <h2><?php echo isset($message) ? $message : "Access Denied"; ?></h2>
        <a href="index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
