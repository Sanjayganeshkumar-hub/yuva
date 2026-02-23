<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Menu - Online Tiffin Service</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; }
        .menu-item { border-bottom: 1px solid #eee; padding: 15px 0; }
        .menu-item:last-child { border-bottom: none; }
        .menu-item b { color: #e67e22; }
        .btn { display: inline-block; background: #3498db; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 20px; transition: background 0.3s; }
        .btn:hover { background: #2980b9; }
        .nav { text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daily Food Menu</h1>
        <div class="nav">
            <a href="select.php" class="btn">Select Your Meals</a>
            <a href="admin_login.php" style="margin-left: 20px; color: #7f8c8d;">Admin Login</a>
        </div>
        
        <?php
        $day_today = date("l"); 
        $result = mysqli_query($conn, "SELECT * FROM menu WHERE day='$day_today'");
        
        echo "<h3 style='text-align:center;'>Today is $day_today</h3>";
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='menu-item'>";
                echo "<b>Meal Type:</b> " . htmlspecialchars($row['meal_type']) . "<br>";
                echo "<b>Items:</b> " . htmlspecialchars($row['items']);
                echo "</div>";
            }
        } else {
            echo "<p style='text-align:center;'>No menu items listed for today ($day_today).</p>";
        }
        ?>
    </div>
</body>
</html>
