<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mrk_xerox";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// If signup button is clicked
if (isset($_POST['signup-btn'])) {
    // Get user input data
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert user data into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="signup-container">
        <h1>Signup</h1>
        <form action="register.php" method="post">
            <label for="username">Name:</label>
            <input type="text" id="name" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <button type="submit" name="signup-btn">Signup</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
<style>
    .signup-container {
        margin: 50px auto;
        width: 400px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        text-align: center;
    }

    h1 {
        margin-bottom: 30px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        text-align: left;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #3e8e41;
    }
</style>

</html>