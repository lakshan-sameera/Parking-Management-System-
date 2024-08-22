<!-- success_page.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <link rel="stylesheet" href="success_page.css">
</head>
<body>
    <div class="container">
        <h2>Payment Successful</h2>
        <img src="right1.gif" alt="Scannable Image">
        
        <div class="back-button-container">
            <form action="index.html" method="post">
                <button type="submit" name="backToHome" class="back-button">Exit</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript functions to handle button clicks and redirection
        function redirectToIndexPage() {
            window.location.href = "http://127.0.0.1/TCC2/index.html";
        }
    </script>
</body>
</html>
