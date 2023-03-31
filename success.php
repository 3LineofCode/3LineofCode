<!DOCTYPE html>
<html>

<head>
    <title>Success Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="success">
        <h2>Success!</h2>
        <p>Data inserted successfully.</p>
    </div>
    <script src="script.js"></script>
    <script>
        // Hide the success message after 3 seconds
        setTimeout(function() {
            var successMessage = document.querySelector('.success');
            successMessage.style.display = 'none';
        }, 30000);
    </script>
</body>
<style>
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    .success {
        background-color: #c8e6c9;
        border: 1px solid #81c784;
        border-radius: 5px;
        width: 400px;
        margin: 50px auto;
        text-align: center;
        padding: 20px;
    }

    .success h2 {
        color: #4caf50;
        margin-top: 0;
    }

    .success p {
        font-size: 18px;
        margin-bottom: 0;
    }
</style>

</html>