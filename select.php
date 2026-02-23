<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Meal - Online Tiffin Service</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 15px; font-weight: bold; }
        input, select { padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background: #2ecc71; color: #fff; border: none; margin-top: 25px; cursor: pointer; font-size: 16px; transition: background 0.3s; }
        input[type="submit"]:hover { background: #27ae60; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #3498db; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Meal Selection</h1>
        <form method="post" action="save_selection.php">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="day">Select Day:</label>
            <select id="day" name="day">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>

            <label for="meal_type">Select Meal Type:</label>
            <select id="meal_type" name="meal_type">
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
            </select>

            <input type="submit" value="Submit Selection">
        </form>
        <a href="index.php" class="back-link">Back to Menu</a>
    </div>
</body>
</html>
