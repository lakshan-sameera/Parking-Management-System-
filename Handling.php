<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("db_connection.php");

// (1) Total active vehicles count
$countActiveQuery = "SELECT COUNT(*) AS active_count FROM parking_records WHERE active_status='yes'";
$countActiveResult = mysqli_query($conn, $countActiveQuery);
$totalActiveCount = ($countActiveResult && mysqli_num_rows($countActiveResult) > 0) ? mysqli_fetch_assoc($countActiveResult)['active_count'] : 0;

// (2) Total left vehicles count
$countLeftQuery = "SELECT COUNT(*) AS left_count FROM parking_records WHERE active_status='no'";
$countLeftResult = mysqli_query($conn, $countLeftQuery);
$totalLeftCount = ($countLeftResult && mysqli_num_rows($countLeftResult) > 0) ? mysqli_fetch_assoc($countLeftResult)['left_count'] : 0;

// (3) Total revenue
$totalRevenueQuery = "SELECT SUM(revenue) AS total_revenue FROM parking_records";
$totalRevenueResult = mysqli_query($conn, $totalRevenueQuery);
$totalRevenue = ($totalRevenueResult && mysqli_num_rows($totalRevenueResult) > 0) ? mysqli_fetch_assoc($totalRevenueResult)['total_revenue'] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard</title>
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
            color: #fff; /* Text color for the redirected page */
        }

        .container {
            background-color: #ffffff5f;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.71);
            padding: 20px;
            width: 450px;
            max-height: 600px;
            overflow-y: auto; /* Add scroll for overflow */
        }

        h2 {
            color: #333;
            text-align: center;
            font-size: 33px;
        }

        p {
            margin: 10px 0;
            font-weight: lighter;
            padding: 2px;
            color: #000; /* Text color for the Administrator Dashboard */
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
        font-size: 16px;s
        font-weight: bold;
        cursor: pointer;
        margin-left:185px;
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
    <div class="container">
        <h2>Administrator Dashboard</h2>

        <!-- (1) Total active vehicles count -->
        <p>Total active vehicles count = <?php echo $totalActiveCount; ?></p>

        <!-- (2) Total left vehicles count -->
        <p>Total left vehicles count = <?php echo $totalLeftCount; ?></p>

        <!-- (3) Total revenue -->
        <p>Total revenue = $<?php echo $totalRevenue; ?></p>

        <!-- You can add more sections or data as needed -->
        <a href="administrator.php" class="back-button">Back</a>
    </div>
</body>

</html>
