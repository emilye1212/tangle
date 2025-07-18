<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warden - My Warden</title>
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

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"],
        input[type="button"],
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="button"],
        input[type="reset"] {
            background-color: black;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover,
        input[type="reset"]:hover {
            background-color: #004080;
        }

        input[type="button"] {
            margin-right: 10px;
        }

        legend {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
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
        .box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
        }
        .titlemargin {
            align-items: center;
        }

    </style>
</head>
<body>
<div class="banner">
    <img src="wardenlogo.png" alt="Warden Logo">
    <h1 style="margin-left: 20px;"><i>Warden</i></h1>
</div>
<div style="text-align: center;">
    <h1> My captures </h1>
</div>


<div class="box">
    <?php
    // Main database connection details
    $mainDBHost = 'stu-db.aet.leedsbeckett.ac.uk';
    $mainDBUser = 'c3622379';
    $mainDBPass = 'MyDB02013522';
    $mainDBName = 'c3622379';

    // Connect to the main database to fetch user credentials
    $mainConnection = new mysqli($mainDBHost, $mainDBUser, $mainDBPass, $mainDBName);

    // Check connection
    if ($mainConnection->connect_error) {
        die("Connection failed: " . $mainConnection->connect_error);
    }

    // Query to fetch user-specific data from the "motions" table
    $userDataQuery = "SELECT * FROM Motions";
    $userDataResult = $mainConnection->query($userDataQuery);

    if ($userDataResult->num_rows > 0) {
        // Output data
        while ($row = $userDataResult->fetch_assoc()) {
            echo "<div class='motion-box'>";
            echo "<p><b>Camera:</b> " . $row['camName'] . "</p>";
            echo "<p><b>Motion Time: </b>" . $row['motionTime'] . " <b>Motion Date:</b> " . $row['motionDate'] . "</p>";
            echo "<img src='" . $row['motionFilename'] . "' alt='Motion Image'>";
            echo "</div>";
        }
    } else {
        echo "No motion data found.";
    }

    // Close the main database connection
    $mainConnection->close();
    ?>
</div>
</br>
<div class="container">
        <form method="post" action="upload.php">
            <fieldset>
                <legend>Did we miss something?</legend>
                <p1> <i>Upload a capture here: </i> </br></br></p1>
                <input type="file" name="file" required> </br>
                <input type="submit" value="Upload">
            </fieldset>
        </form>
    </div>
</br>
<div class="back-button">
    <p><a href="account.php">Back</a></p>
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
