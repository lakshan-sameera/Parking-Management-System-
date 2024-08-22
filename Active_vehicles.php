<!-- active_vehicles.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Vehicles</title>
    <link rel="stylesheet" href="active_vehicles.css"> <!-- Link to your external CSS file -->
</head>

<body>
    <div class="page-wrapper">
        <div class="container">
            <h2>Active Vehicles</h2>
            <?php
            include("db_connection.php");

            $query = "SELECT * FROM parking_records WHERE active_status='yes'";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    // Display details of active vehicles
                    echo "<p>ID Number: " . $row['id_number'] . "</p>";
                    echo "<p>Vehicle Number: " . $row['vehicle_number'] . "</p>";
                    echo "<p>Entering Time: " . $row['entering_time'] . "</p>";
                    echo "<hr>";
                }
            } else {
                echo "<p class='no-results'>No active vehicles found.</p>";
            }

            mysqli_close($conn);
            ?>
        </div>

        <!-- Back button linking to the previous page -->
        <a href="administrator.php" class="back-button">Back</a>
    </div>
</body>

</html>
