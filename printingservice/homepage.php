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
    <title>PrintSphere</title>
    <link rel="icon" href="nameplacelogo.png" type="image/png">
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

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
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
            background-color: #3e6397;
            height: 50px; 
            width: 100%; 
            display: flex;
            align-items: center; 
            padding: 0 20px;
        }

        .banner img {
            width: 50px;
            height: auto; 
            margin-right: 10px;
        }


        .banner h1 {
            color: white;
            margin: 0;
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


        }   
        .box img {
            width: 100px; /* Adjust image size */
            height: auto;
            margin-bottom: 10px; /* Add spacing below image */
}
    </style>
</head>
<body>

<div class="banner">
    <img src="nameplace.png" alt="Nameplace Logo">
    <h1 style="margin-left: 20px;"><i>PrintSphere</i></h1>
    <div class="datetime" id="datetime"></div>
</div>

<div class="files-button">
    <p><a href="myfiles.php">Download my files</a></p>
</div>

<div class="print-button">
    <p><a href="printingservices.php">Printing services</a></p>
</div>

<div class="design-button">
    <p><a href="designingservices.php">Designing services</a></p>
</div>

<div class="footer">
    <div class="contact-info">
        <h2 class="contact-heading">Contact Us</h2>
    </div>
</div>

<div class="contact-info">
    <p>printsphere@gmail.com</p>
    <p>01522 688 027</p>
</div>