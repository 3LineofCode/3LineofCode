<!DOCTYPE html>
<html>

<head>
    <title>Navbar with Dropdown List</title>
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="#">Revenue</a>
                <ul class="dropdown">
                    <li><a href="index.php">Revenue Form</a></li>
                    <li><a href="data.php">Revenue Data</a></li>
                </ul>
            </li>
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li class="settings" style=" left: 1375px;">
                <a href="#">Profile</a>
                <ul class="dropdown">
                    <li><a href="feedback.php">Customer Feedback</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>
            </li>
        </ul>
    </nav>
</body>
<style>
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        color: #fff;
        padding: 10px;
    }

    .navbar ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    .navbar li {
        margin: 0 10px;
        position: relative;
    }

    .navbar a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
    }

    .navbar a:hover {
        background-color: #555;
    }

    .dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        display: none;
        z-index: 1;
    }

    .dropdown li {
        margin: 0;
    }

    .dropdown a {
        padding: 10px;
        display: block;
        background-color: #444;
        width: 100%;
    }

    .dropdown a:hover {
        background-color: #666;
    }

    /* Show the dropdown list when the parent li element is hovered */
    .navbar li:hover .dropdown {
        display: block;
    }

    /* Hide the dropdown list when the mouse is not over the parent li element */
    .navbar li:not(:hover) .dropdown {
        display: none;
    }

    /* Settings dropdown */
    .settings {
        position: relative;
    }

    .settings .dropdown {
        position: absolute;
        top: 100%;
        right: 0;
    }

    .navbar li:last-child {
        margin-left: auto;
      
    }
</style>

</html>