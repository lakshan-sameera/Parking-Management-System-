<!-- payment_page.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="payment_page.css">
</head>
<body>
    <div class="container">
        <h2>Payment Page</h2>
        <?php
            session_start();
            echo "<p>Time Difference: " . $_SESSION['timeDifference'] . "</p>";
            echo "<p>Payment Balance: $" . $_SESSION['paymentBalance'] . "</p>";
        ?>
        <img src="QR-Code.png" alt="Scannable Image">
        <form action="process.php" method="post">
            <button type="submit" name="done">Done</button>
        </form>
    </div>
</body>
</html>
