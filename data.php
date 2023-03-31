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
    <title>Shop Revenue Data</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php include 'nav.php'; ?>

    <h2>Shop Revenue Data</h2>
    <button id="exportBtn">Export Data</button>
    <div id="datePickerContainer"></div>
    <hr>
    <table>
        <tr style="background-color: #4286f4; color: white;">
            <td>Date</td>
            <td>Item Name</td>
            <td>In Cash</td>
            <td>Online Payment</td>
            <td>Total Revenue</td>
        </tr>
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

        // Fetch data from revenue table
        $sql = "SELECT date, item_name, SUM(in_cash) AS in_cash, SUM(online_payment) AS online_payment, (SUM(in_cash) + SUM(online_payment)) AS total_revenue
        FROM revenue
        GROUP BY date, item_name
        ORDER BY date";
        $result = mysqli_query($conn, $sql);

        $total_in_cash = 0;
        $total_online_payment = 0;
        $total_revenue = 0;

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            $current_date = "";
            while ($row = mysqli_fetch_assoc($result)) {
                // Start a new row group if the date changes
                if ($current_date != $row["date"]) {
                    if ($current_date != "") {
                        // Output the total for the previous date
                        echo "<tr class='total'><td colspan='2'>Total</td><td>$total_in_cash</td><td>$total_online_payment</td><td>$total_revenue</td></tr>";
                    }
                    $current_date = $row["date"];
                    $total_in_cash = 0;
                    $total_online_payment = 0;
                    $total_revenue = 0;
                }

                echo "<tr>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["item_name"] . "</td>";
                echo "<td>" . $row["in_cash"] . "</td>";
                echo "<td>" . $row["online_payment"] . "</td>";
                echo "<td>" . $row["total_revenue"] . "</td>";
                echo "</tr>";

                // Add to the totals
                $total_in_cash += $row["in_cash"];
                $total_online_payment += $row["online_payment"];
                $total_revenue += $row["total_revenue"];
            }

            // Output the total for the last date
            echo "<tr class='total'><td colspan='2'>Total</td><td>$total_in_cash</td><td>$total_online_payment</td><td>$total_revenue</td></tr>";
        } else {
            echo "0 results";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </table>
    <hr>
    <script>
        const exportBtn = document.getElementById("exportBtn");
        const datePickerContainer = document.getElementById("datePickerContainer");

        exportBtn.addEventListener("click", () => {
            // If the date picker container is already visible, hide it and return
            if (datePickerContainer.style.display === "block") {
                datePickerContainer.style.display = "none";
                return;
            }

            // Create a date input element
            const dateInput = document.createElement("input");
            dateInput.type = "date";

            // Create a button to initiate export after selecting date
            const exportDateButton = document.createElement("button");
            exportDateButton.textContent = "Export";
            exportDateButton.addEventListener("click", () => {
                const selectedDate = dateInput.value;

                if (selectedDate !== "") {
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", `export.php?date=${selectedDate}`, true);
                    xhr.responseType = "blob";

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            const url = window.URL.createObjectURL(xhr.response);
                            const link = document.createElement("a");
                            link.href = url;
                            link.download = `revenue_data_${selectedDate}.csv`;
                            link.click();
                        }
                    };

                    xhr.send();
                }

                // Hide the date picker container after exporting
                datePickerContainer.style.display = "none";
            });

            // Add the date input and export button to the container element
            datePickerContainer.innerHTML = "";
            datePickerContainer.appendChild(dateInput);
            datePickerContainer.appendChild(exportDateButton);

            // Show the date picker container
            datePickerContainer.style.display = "block";
        });
    </script>
</body>

</html>