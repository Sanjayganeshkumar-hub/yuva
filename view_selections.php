<?php
session_start();
include "db.php";
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

$result = mysqli_query($conn, "SELECT * FROM selections ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Selections - Admin</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #fdfdfd; margin: 0; display: flex; }
        .sidebar { height: 100vh; width: 250px; background: #2c3e50; color: #fff; padding-top: 20px; position: sticky; top: 0; }
        .sidebar a { display: block; color: #bdc3c7; padding: 15px 25px; text-decoration: none; }
        .sidebar a:hover { background: #34495e; color: #fff; }
        .main { flex: 1; padding: 40px; }
        table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #3498db; color: white; }
        tr:hover { background: #f9f9f9; }
        .status { padding: 5px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; background: #ffeaa7; color: #d6a017; }
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
        <h1>Customer Meal Selections</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Day</th>
                    <th>Meal Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['day']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['meal_type']) . "</td>";
                    echo "<td><span class='status'>" . htmlspecialchars($row['status']) . "</span></td>";
                    echo "</tr>";
                }
                if (mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='5' style='text-align:center;'>No selections found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
