<!DOCTYPE html>
<html>

<head>
    <title>Feedback</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container">
        <h2>Feedback</h2>

        <div class="card-container">
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

            // Get feedback data from database
            $sql = "SELECT * FROM feedback";
            $result = mysqli_query($conn, $sql);

            // Check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // Output table header
                echo "<table>";
                echo "<tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>";

                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["subject"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "</tr>";
                }

                // Output table footer
                echo "</table>";
            } else {
                echo "0 results";
            }

            // Close database connection
            mysqli_close($conn);
            ?>

        </div>
    </div>
</body>

</html>