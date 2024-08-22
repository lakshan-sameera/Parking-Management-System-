<!-- enter_page.php -->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Page</title>
    <link rel="stylesheet" href="enter_page.css">
</head>

<body>
    <div class="container">
        <h2>Enter Page</h2>
        <p>ID Number: <?php echo $_SESSION['idNumber']; ?></p>
        <p>Vehicle Number: <?php echo $_SESSION['vehicleNumber']; ?></p>
        <p>Start Time: <?php echo $_SESSION['startTime']; ?></p>
        <p>Parking Slot: <?php echo $_SESSION['parkingSlot']; ?></p>
        <form action="index.html" method="post">
            <button type="submit" name="backToHome" class="back-button">Back</button>
        </form>
    </div>
</body>

</html>
