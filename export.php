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

// Get the selected date from the query string
$selectedDate = $_GET["date"];

// Fetch data from revenue table for the selected date
$sql = "SELECT date, item_name, in_cash, online_payment, (in_cash + online_payment) AS total_revenue
FROM revenue
WHERE date = '$selectedDate'
ORDER BY date";
$result = mysqli_query($conn, $sql);

// Create a new CSV file and write the data to it
$filename = "revenue_data_" . $selectedDate . ".csv";
$file = fopen($filename, "w");

// Write the header row
$header = array("Date", "Item Name", "In Cash", "Online Payment", "Total Revenue");
fputcsv($file, $header);

// Write the data rows
while ($row = mysqli_fetch_assoc($result)) {
  $data = array($row["date"], $row["item_name"], $row["in_cash"], $row["online_payment"], $row["total_revenue"]);
  fputcsv($file, $data);
}

fclose($file);

// Send the CSV file as a response
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=" . $filename);
readfile($filename);

// Close database connection
mysqli_close($conn);
