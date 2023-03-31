<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect user to login page
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shop Revenue Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <h2>Shop Revenue Form</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $date = $_POST['date'];
        $item_name = $_POST['item_name'];
        if ($_POST['payment_method'] == 'in_cash') {
            $in_cash = $_POST['amount'];
            $online_payment = 0;
        } else {
            $in_cash = 0;
            $online_payment = $_POST['amount'];
        }

        $total = $in_cash + $online_payment;

        // Insert data into database
        $sql = "INSERT INTO revenue (date, item_name, in_cash, online_payment, total) VALUES ('$date', '$item_name', $in_cash, $online_payment, $total)";

        if (mysqli_query($conn, $sql)) {
            // Redirect the user to a success page after data is inserted
            header("Location: success.php");
            exit(); // Terminate the current script to prevent any further code from executing
        } else {
            echo "<p class='error-message'>Error inserting data: " . mysqli_error($conn) . "</p>";
        }

        // Close database connection
        mysqli_close($conn);
    }
    ?>


    <form method="post" action="">
        <label for="date">Date:</label>
        <input type="date" name="date" required><br><br>

        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required><br><br>

        <label for="payment_method">Payment Method:</label>
        <label class="radio">
            <input type="radio" name="payment_method" value="in_cash" checked>
            <span>In Cash</span>
        </label>

        <label class="radio">
            <input type="radio" name="payment_method" value="online_payment">
            <span>Online Payment</span>
        </label>


        <label for="amount">Amount:</label>
        <input type="number" name="amount" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
<script>
    // Get the success message element
    var successMessage = document.getElementById("success-message");

    // Hide the success message after 3 seconds
    setTimeout(function() {
        successMessage.style.display = "none";
    }, 3000);
</script>


</html>