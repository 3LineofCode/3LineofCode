<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <h2>Contact Us</h2>

    <div class="contact-container">
        <div class="contact-form">
            <form method="post" action="send-email.php">
                <label for="name">Name:</label>
                <input type="text" name="name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="subject">Subject:</label>
                <input type="text" name="subject" required>

                <label for="message">Message:</label>
                <textarea name="message" rows="5" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>

        <div class="contact-details">
            <h3>Contact Details:</h3>
            <p><i class="fas fa-map-marker-alt"></i> Xerox Wala</p>
            <p><i class="fas fa-map-marker-alt"></i> Village: Tunda, Near by Tunda Gate</p>
            <p><i class="fas fa-phone"></i> (+91) 9106204999</p>
            <p><i class="fas fa-envelope"></i> <a href="mailto:moseenkumbhar7656@gmail.com">moseenkumbhar7656@gmail.com</a></p>
        </div>

    </div>
</body>
<style>
    .contact-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .contact-form {
        width: 50%;
        margin: 20px;
    }

    .contact-form form {
        display: flex;
        flex-direction: column;
    }

    .contact-form label {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .contact-form input,
    .contact-form textarea {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: none;
        box-shadow: 0px 0px 5px grey;
    }

    .contact-form button {
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .contact-form button:hover {
        background-color: #3e8e41;
    }

    .contact-details {
        width: 50%;
        margin: 20px;
        text-align: center;
    }

    .contact-details h3 {
        margin-bottom: 20px;
    }

    .contact-details p {
        margin-bottom: 10px;
    }

    .contact-details i {
        margin-right: 10px;
    }
</style>

</html>