<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warden - My Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333;
        }

        h1, h2 {
            color: black;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .welcome-message {
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            margin-bottom: 20px;
        }

        .logout-link {
            color: #0056b3;
            text-decoration: none;
        }

        .logout-link:hover {
            text-decoration: underline;
        }
        .contact-heading {
            text-align: center;
        }
        .contact-info {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contact-info p {
            display: inline-block;
            margin-right: 20px;
            text-align: center;
        }
        .banner {
            background-color: black; /* Blue color */
            height: 50px; /* Adjust the height as needed */
            width: 100%; /* Full width */
            display: flex; /* Use flexbox for layout */
            align-items: center; /* Center items vertically */
            padding: 0 20px; /* Add padding to center text horizontally */
        }

        .banner img {
            width: 50px; /* Set the width of the image */
            height: auto; /* Maintain aspect ratio */
            margin-right: 10px; /* Add spacing between the image and the heading */
        }


        .banner h1 {
            color: white; /* Set text color to white */
            margin: 0; /* Remove default margin */
        }
    </style>
</head>
<body>

<div class="banner">
<img src="wardenlogo.png" alt="Warden Logo">
    <h1 style="margin-left: 20px;"><i>Warden</i></h1>
</div>

<div class="container">
    <?php
    include 'init.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION['email'])) {
        echo "<div class='welcome-message'>Welcome, ".$_SESSION['firstname']."!</div>";
    } else {
        echo "<div>Email session not set</div>";
        include 'loginprocess.php';

        if(isset($_SESSION['error'])) {
            echo "<div class='error-message'>Error message: " . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
    }
    ?>

    <h2> <a class='link' href='mywarden.php'>My Warden </a></h2>
    <h2> <a class='link' href='mycams.php'>My Cams </a></h2>

    <?php
    echo "<a class='logout-link' href='logout.php'>Logout</a>";
    ?>
</div>

<div class="footer">
    <div class="contact-info">
        <h2 class="contact-heading">Contact Us</h2>
        </div>
</div>


<div class="contact-info">
    <p>warden@gmail.com</p>
    <p>0113 123 456</p>
</div>

</body>
</html>
