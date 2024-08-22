<!-- leave_page.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Page</title>
    <link rel="stylesheet" href="leave_page.css">
</head>
<body>
    <div class="container">
        <h2>Leave Page</h2>
        <?php
            session_start();
            echo "<p>ID Number: " . $_SESSION['idNumber'] . "</p>";
            echo "<p>Vehicle Number: " . $_SESSION['vehicleNumber'] . "</p>";
            echo "<p>Time Difference: " . $_SESSION['timeDifference'] . "</p>";
        ?>
        <div class="button-container">
            <form action="index.html" method="post">
                <button type="submit" name="backToHome" class="back-button">Back</button>
            </form>
            <form action="process.php" method="post" class="proceed-form">
                <button type="submit" name="proceedToPayment" class="proceed-button">Proceed to Payment</button>
            </form>
        </div>
    </div>
</body>
</html>
