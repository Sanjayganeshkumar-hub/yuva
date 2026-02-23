<?php
session_start();
include "db.php";
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

if (isset($_POST['add'])) {
    $day = $_POST['day'];
    $meal = $_POST['meal_type'];
    $items = $_POST['items'];
    
    try {
        $stmt = $conn->prepare("INSERT INTO menu (day, meal_type, items) VALUES (:day, :meal, :items)");
        $stmt->execute(['day' => $day, 'meal' => $meal, 'items' => $items]);
        $msg = "Menu Item Added Successfully!";
    } catch(PDOException $e) {
        $msg = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Menu - Admin</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #fdfdfd; margin: 0; display: flex; }
        .sidebar { height: 100vh; width: 250px; background: #2c3e50; color: #fff; padding-top: 20px; position: sticky; top: 0; }
        .sidebar a { display: block; color: #bdc3c7; padding: 15px 25px; text-decoration: none; }
        .sidebar a:hover { background: #34495e; color: #fff; }
        .main { flex: 1; padding: 40px; }
        form { max-width: 500px; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .input-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn { background: #3498db; color: white; border: none; padding: 12px 20px; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .msg { padding: 10px; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="text-align:center;">Tiffin Admin</h2>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="add_menu.php">Manage Menu</a>
        <a href="view_selections.php">View Selections</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="main">
        <h1>Add New Menu Item</h1>
        <?php if (isset($msg)) echo "<div class='msg'>$msg</div>"; ?>
        <form method="post">
            <div class="input-group">
                <label>Day</label>
                <select name="day">
                    <option>Monday</option><option>Tuesday</option><option>Wednesday</option>
                    <option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option>
                </select>
            </div>
            <div class="input-group">
                <label>Meal Type</label>
                <select name="meal_type">
                    <option>Breakfast</option><option>Lunch</option><option>Dinner</option>
                </select>
            </div>
            <div class="input-group">
                <label>Food Items (comma separated)</label>
                <input type="text" name="items" placeholder="e.g. Roti, Sabzi, Daal, Rice" required>
            </div>
            <button type="submit" name="add" class="btn">Add Menu Item</button>
        </form>
    </div>
</body>
</html>
