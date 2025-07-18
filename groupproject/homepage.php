
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
    <title>Warden - Login</title>
    <link rel="icon" href="wardenlogoblack.png" type="image/png">
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
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: black;
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
            background-color: black;
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

        .datetime {
            position: absolute;
            top: 10px;
            right: 20px;
            color: white;
            font-size: 14px;
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
    <img src="wardenlogo.png" alt="Warden Logo">
    <h1 style="margin-left: 20px;"><i>Warden</i></h1>
    <div class="datetime" id="datetime"></div>
</div>

<form method="post" action="loginprocess.php">
    <fieldset>
        <legend><h2> Login </h2></legend>
        <h3> Email: </h3>
        <input type="text" name="email" />
        <h3> Password: </h3>
        <input type="password" name="password"/>
        <input type="submit" name="submit" value="Login"/>
        <input type="reset" value="Clear" />
        <legend> New here? Sign up <a href="insertCustomer.php">now</a>. </legend>
    </fieldset>
</form>

<div class="box">
    <h2>Otherwise, learn what we do...</h2>
    <p1>
        Welcome to Warden, your ultimate partner in ensuring safety and security. <br>
        Our platform is designed to give you peace of mind by providing stability and control over your home or business through advanced motion sensor technology. <br>
        With Warden, you can log into your account from anywhere and keep a watchful eye on your surroundings. Our intuitive system allows you to monitor activity in real time, enabling you to take preventative measures when necessary. Whether you’re home or away, Warden ensures that you remain connected and informed. <br>
        <br>
        At Warden, we believe in empowering you with the tools to safeguard what matters most, allowing you to focus on the things you love. <br>
        <br>
        Join a community of like-minded individuals who value resilience and are committed to protecting their spaces. <br>
        <br>
        <img class="box-img" src="wardenlogo.png" alt="Warden Logo">
        <br>
        Experience the Warden difference today and take the first step towards a safer, more secure tomorrow.
        <br>
    </p1>
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

 