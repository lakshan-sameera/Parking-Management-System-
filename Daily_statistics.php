<!-- daily_statistics.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Statistics</title>
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
            max-height: 500px;
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
            <h2>Daily Statistics</h2>
            <?php
            include("db_connection.php");

            // Get current date
            $currentDate = date('Y-m-d');

            $query = "SELECT * FROM parking_records WHERE entering_time LIKE '%$currentDate%'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Display details of vehicles with leaving time matching the current date
                    echo "<p>ID Number: " . $row['id_number'] . "</p>";
                    echo "<p>Vehicle Number: " . $row['vehicle_number'] . "</p>";
                    echo "<p>Entering Time: " . $row['entering_time'] . "</p>";
                    echo "<p>Leaving Time: " . $row['leaving_time'] . "</p>";
                    echo "<hr>";
                }
            } else {
                echo "<p class='no-results'>No records found for the current date.</p>";
            }

            mysqli_close($conn);
            ?>
        </div>

        <!-- Back button linking to the previous page -->
        <a href="administrator.php" class="back-button">Back</a>
    </div>
</body>

</html>
