<!-- error_page.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <link rel="stylesheet" href="error_page.css">
</head>

<body>
    <div class="container">
        <h2>Error</h2>
        <div class="error-icon">
            <img src="load.gif" alt="Error Icon">
        </div>
        <p>Your inputs are wrong. Please check your information and try again.</p>
        <form action="index.html" method="post">
            <button type="submit" name="backToHome" class="back-button">Back</button>
        </form>
    </div>
</body>

</html>
