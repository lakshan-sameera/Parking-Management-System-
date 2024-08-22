<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard</title>
    <link rel="stylesheet" href="administrator.css"> <!-- Link to your external CSS file -->
</head>
<body>
    <div class="container">
        <h2>Administrator Dashboard</h2>
        <div class="button-container">
            <form action="active_vehicles.php" method="get">
                <button type="submit">Active Vehicles</button>
            </form>
            <form action="left_vehicles.php" method="get">
                <button type="submit">Left Vehicles</button>
            </form>
            <form action="filled_slots.php" method="get">
                <button type="submit">Filled Slots</button>
            </form>
            <form action="daily_statistics.php" method="get">
                <button type="submit">Daily Statistics</button>
            </form>
            <form action="handling.php" method="get">
                <button type="submit">Report</button>
            </form>
        </div>
    </div>
</body>
</html>
