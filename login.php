<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mrk_xerox";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get username and password from form
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Check if username and password match
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        $_SESSION["username"] = $username;
        header("location: index.php");
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
<style>
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    .login-container {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
        max-width: 400px;
        padding: 20px;
        text-align: center;
    }

    h2 {
        margin-top: 0;
    }

    label {
        display: block;
        margin-bottom: 5px;
        text-align: left;
    }

    input[type=text],
    input[type=password] {
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
        padding: 10px;
        width: 100%;
    }

    button[type=submit] {
        background-color: #4CAF50;
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
        padding: 12px 20px;
        width: 100%;
    }

    button[type=submit]:hover {
        background-color: #45a049;
    }
</style>

</html>