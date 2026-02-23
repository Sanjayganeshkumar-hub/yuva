<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Online Tiffin Service</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #fdfdfd; margin: 0; }
        .sidebar { height: 100vh; width: 250px; background: #2c3e50; position: fixed; color: #fff; padding-top: 20px; }
        .sidebar h2 { text-align: center; font-size: 20px; margin-bottom: 30px; }
        .sidebar a { display: block; color: #bdc3c7; padding: 15px 25px; text-decoration: none; transition: 0.3s; }
        .sidebar a:hover { background: #34495e; color: #fff; }
        .content { margin-left: 250px; padding: 40px; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 20px; }
        .card-container { display: flex; gap: 20px; margin-top: 30px; }
        .card { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); flex: 1; text-align: center; border-top: 4px solid #3498db; }
        .card h3 { margin: 0; color: #7f8c8d; font-size: 16px; }
        .card p { font-size: 28px; font-weight: bold; margin: 10px 0 0; color: #2c3e50; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Tiffin Admin</h2>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="add_menu.php">Manage Menu</a>
        <a href="view_selections.php">View Selections</a>
        <a href="logout.php" style="margin-top: 50px; color: #e74c3c;">Logout</a>
    </div>
    <div class="content">
        <div class="header">
            <h1>Welcome, Admin</h1>
        </div>
        <div class="card-container">
            <div class="card">
                <h3>System Status</h3>
                <p>Online</p>
            </div>
            <div class="card">
                <h3>Quick Actions</h3>
                <p><a href="add_menu.php" style="text-decoration:none; color:inherit; border-bottom: 1px dashed;">Add Menu</a></p>
            </div>
        </div>
        <div style="margin-top: 40px;">
            <h3>Getting Started</h3>
            <p>Use the sidebar to manage your daily food menu items and view customer meal selections for the upcoming days.</p>
        </div>
    </div>
</body>
</html>
