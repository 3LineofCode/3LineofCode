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

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO feedback (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

if (mysqli_query($conn, $sql)) {
    header('Location: success.php');
} else {
    echo "<p class='error-message'>Error inserting data: " . mysqli_error($conn) . "</p>";
}

// Close database connection
mysqli_close($conn);
?>
