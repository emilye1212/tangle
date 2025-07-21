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
    <title>Tangle</title>
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
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            border-radius: 10px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: black;
            color: #fff;
            cursor: pointer;
        }

        input[type="getstarted"] {
            background-color: #de904b;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #004080;
        }

        input[type="reset"] {
            margin-right: 10px;
        }

        input[type="getstarted"]:hover {
            background-color: #004080;
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
            display: flex;
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
            background-color: white;
            color: #d98d6c;
            padding: 20px;
            border-radius: 30px;
            margin-top: 30px !important;
            margin-bottom: 30px !important;
            text-align: center;
            width: 900px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            padding-bottom: 30px;
        }
        
        .box h2 {
            color: #5c5c5c;
            vertical-align: center;
            padding-top: 20px !important;        
        }

        .box h1 {
            color: black;
            vertical-align: center;
            
        }

        .datetime {
            position: absolute;
            top: 10px;
            right: 20px;
            color: orangered;
            font-size: 14px;
        }

        .box img {
            width: 300px;
            height: 300px;
        }

        .boxa {
            width: 200px !important;
            height: 300px !important;

        }

        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
            vertical-align: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .box-left, .box-right {
            flex: 1 1 400px;
            text-align: center;
            vertical-align: auto;
        }

        .box-left {
            vertical-align: center;
        }

        .box-img {
            width: 200px;
            height: 200px;
        }

        .login-button {
            display: flex;
            flex-direction: column;
            gap: 1px;
            align-items: center;
            justify-content: flex-start;
            font-size: 22px;
        }

        .login-button .btn {
            display: inline-block;
            background-color: #de904b;
            color: white;
            padding: 12px 60px;
            border-radius: 15px;
            text-decoration: none;
            font-size: 1.1em;
            transition: background-color 0.3s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .login-button .btn:hover {
            background-color: #e8c390;
        }

        .button-black {
            color: #919191;
            font-weight: bold;
        }
        .boxandroid {
            height: 50px !important;
            width: 50px !important;
        }

        .androidtext {
            color: #5c5c5c;
            font-size: 25px;
            padding-left: 10px;
        }
        .boxandroid,
        .androidtext {
            display: inline-block;
            vertical-align: middle;
            padding-top: 0; 
        }

        .boxtext {
            color: #de904b;
            font-family: 'Capriola', sans-serif;
            font-size: 20px;
            padding-bottom: 0px;
        }

    </style>
</head>
<body>

<div class="banner">
    <img src="orangelogo.png" alt="Tangle Logo">
    <h1 style="margin-left: 20px;"><i>Tangle</i></h1>
</div>

<div class="box">
    <h2>Welcome to Tangle - Your Ultimate Study Companion </h2><br>
    <div class="flex-container">
    <div class="box-left">
    <div class="login-button">
        <p><a href="signup.php" class="btn">Get Started</a></p>
        <p><a href="loginpage.php" class="button-black">Login</a></p>            
    </div>
</div>

<div class="box-right">
    <img class="box-img" src="gameboy.png" alt="Tangle Mascot">
</div>
</div>
</div>

<div class="box">
    <h2>Otherwise, learn how we help you crack the study code...</h2>
    <p1>
    <br> <div class = "boxtext" >Boost your productivity with Tangle’s playful Pomodoro-style approach to studying. </h1></br>
    <br> Track your sessions, play mini-games during breaks, and stay motivated. </div>
    <br>
    <img class="boxa" src="cartoontree.png.png" alt="Tangle Logo">
    <br></br>
    <img class="boxandroid" src="androidlogo.png" alt="Android Logo">
    <div class="androidtext">Available on Android</div>
    </div>
    </p1>
</div> 


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

 