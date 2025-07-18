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
    <title>Tangle - Settings</title>
    <link rel="icon" href="orangelogo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Capriola', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5e5db;
            color: #5c5c5c;
        }

        h1, h2 {
            color: #de904b;
            font-family: 'Capriola', sans-serif;
        }

        form {
            width: 1000px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            align-items: flex-start;
            margin: 40px 0;
            box-sizing: border-box;
            margin-left: 40px;
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #de904b;
            color: #fff;
            cursor: pointer;
            font-family: 'Capriola', sans-serif;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #e8c390;
        }

        input[type="reset"] {
            margin-right: 10px;
        }

        legend {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        p1 {
            font-size: 1.1em;
        }

        a {
            color: #0056b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            margin-bottom: 5px;
        }

        .contact-heading {
            padding-top: 300px;
            text-align: center;
            margin: 0;     
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
            background-color: white;
            height: 90px; 
            width: 100%; 
            display:flex;
            align-items: center; 
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .banner img {
            width: 100px;
            height: auto; 
            margin-right: 0;
        }

        .banner h1 {
            color: #d98d6c;
            margin: 0;
            font-size: 50px;
        }

        .box {
            background-color: #000;
            color: #fff;
            padding: 20px;
            border-radius: 9px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 0;
            min-height: 0vh;
            text-align: center;
            
        }

        .box h2 {
            color: #fff;
        }

        .box h1 {
            color: #fff;
        }

        .datetime {
            position: absolute;
            top: 10px;
            right: 20px;
            color: white;
            font-size: 14px;
        }   

        .box img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .now-button {
            color: #d98d6c;
        }

        .back-button {
            text-align: start;
            margin-top: 40px !important;
            margin-bottom: 20px;
            margin-left: 40px;
        }
        .button-black {
            color: #5c5c5c;
            align-items: center;
            margin-left: 50px;
        }
        .userheader {
            margin-left: 30px;
            font-size: 30px;
        }
    </style>
</head>
<body>

<?php
include 'init.php';

if (empty($_SESSION['userId'])) {
    header("Location: loginpage.php");
    exit();
}

$userId = $_SESSION['userId'];

if (mysqli_connect_errno()) {
    die('Database connection failed: ' . mysqli_connect_error());
}
?>

<div class="banner">
    <img src="orangelogo.png" alt="Tangle Logo">
    <h1 style="margin-left: 20px;"><i>Tangle</i></h1> 
    <div class="datetime" id="datetime"></div>
</div>

<div class="back-button">
    <a href="dashboard.php">
        <img src="left-arrow.png" alt="Back" style="width: 30px; height: auto;">
    </a>
</div>

<div class="userheader">Change user details:</div>


<form method="POST" action="updatename.php">
    <label for="firstName">New First Name:</label>
    <input type="text" id="firstName" name="firstName" value="<?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : ''; ?>">

    <label for="lastName">New Last Name:</label>
    <input type="text" id="lastName" name="lastName" value="<?php echo isset($_SESSION['lastName']) ? $_SESSION['lastName'] : ''; ?>">

    <input type="submit" name="submit" value="Submit">
</form>

<form method="POST" action="updatepass.php">
    <label for="oldPassword">Old Password:</label>
    <input type="password" id="oldPassword" name="oldPassword" required>

    <label for="newPassword">New Password:</label>
    <input type="password" id="newPassword" name="newPassword" required>

    <input type="submit" name="submit" value="Submit">

</form>
<a class='button-black' href='logout.php'>Logout</a>


<div class="footer">
    <div class="contact-info">
        <h2 class="contact-heading">Contact Us</h2>
        </div>
</div>

<div class="contact-info">
    <p>tangle@gmail.com</p>
    <p>0113 123 456</p>
</div>

<script>
    function updateDateTime() {
        var now = new Date();
        var datetimeElement = document.getElementById("datetime");
        datetimeElement.textContent = now.toLocaleString();
    }
    updateDateTime();
</script>

</body>
</html>