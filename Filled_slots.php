<!-- filled_slots.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filled Slots</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2c3e50, #3498db); /* Gradient background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .page-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            background-color: #ffffff5f;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.71);
            padding: 20px;
            width: 450px;
            max-height: 600px;
            overflow-y: auto; /* Add scroll for overflow */
            margin-bottom: 20px;
        }

        h2 {
            color: #120606;
            text-align: center;
            font-size: 33px;
        }

        p {
            margin: 10px 0;
            font-weight: bold;
            padding: 2px;
            color: black;
        }

        hr {
            border: 0.5px solid #120606;
        }

        .no-results {
            text-align: center;
            color: #888;
        }

        .back-button {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        /* Style for small screens */
        @media only screen and (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <div class="container">
            <h2>Filled Slots</h2>
            <?php
            include("db_connection.php");

            // Count of vehicles with status 'yes'
            $countQuery = "SELECT COUNT(*) AS filled_slots_count FROM parking_records WHERE active_status='yes'";
            $countResult = mysqli_query($conn, $countQuery);

            if ($countResult && mysqli_num_rows($countResult) > 0) {
                $countRow = mysqli_fetch_assoc($countResult);
                $filledSlotsCount = $countRow['filled_slots_count'];

                // Calculate available slots count
                $totalSlots = 1000;
                $availableSlotsCount = $totalSlots - $filledSlotsCount;

                // Display counts
                echo "<p>Parked Vehicle Count: " . $filledSlotsCount . "</p>";
                echo "<p>Available Slots Count: " . $availableSlotsCount . "</p>";
            } else {
                echo "<p class='no-results'>Error calculating counts.</p>";
            }

            mysqli_close($conn);
            ?>
        </div>

        <!-- Back button linking to the previous page -->
        <a href="administrator.php" class="back-button">Back</a>
    </div>
</body>

</html>
