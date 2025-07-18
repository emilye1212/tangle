<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'init.php'; 

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $emailAd = $_POST['email'];
    $userPassword = $_POST['password'];

    if (empty($firstName) || empty($lastName) || empty($emailAd) || empty($userPassword)) {
        echo "Please fill in all fields.<br>";
    } elseif (!filter_var($emailAd, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.<br>";
    } else {


        $query = "INSERT INTO Credentials (firstName, lastName, emailAd, userPassword) 
                  VALUES ('$firstName', '$lastName', '$emailAd', '$userPassword')";

        if (mysqli_query($connection, $query)) {
            $userId = mysqli_insert_id($connection); 
         
            $_SESSION['userId'] = $userId;
            $_SESSION['emailAd'] = $emailAd;
            $_SESSION['firstname'] = $firstName;

            session_write_close();
            header("Location: dashboard.php");
            exit();
        } else {    
            echo "ERROR: Could not execute query. " . mysqli_error($connection);
        }
    }
}

if (isset($_POST['clear'])) {
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tangle - Sign Up </title>
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
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
            width: 100px; /* Adjust image size */
            height: auto;
            margin-bottom: 10px; /* Add spacing below image */
        }
        
        .back-button {
            text-align: start;
            margin-top: 40px !important;
            margin-bottom: 20px;
            margin-left: 40px;
        }
        .now-button {
            color: #d98d6c;
        }

    </style>
</head>
<body>

<div class="banner">
<img src="orangelogo.png" alt="Tangle Logo">
    <h1 style="margin-left: 20px;"><i>Tangle</i></h1>
</div>

<div class="back-button">
    <a href="index.php">
        <img src="left-arrow.png" alt="Back" style="width: 30px; height: auto;">
    </a>
</div>

<form method="post" action="">
    <fieldset>
        <legend> <h2>Create Account </h2> </legend>
        <label for="firstname"><h3>First Name:</h3> </label>
        <input type="text" name="firstname" required /><br />
       
        <label for="lastname"><h3>Surname:</h3></label>
        <input type="text" name="lastname" required /><br/>

        <label for="email"><h3>Email: </h3></label>
        <input type="email" name="email" required /><br/>

        <label for="password"><h3>Password: </h3></label>
        <input type="password" name="password" required /><br/>
    
        </br><input type="submit" name="submit" value="Continue"/>
        <input type="reset" value="Clear"/>  
        <legend> Already got an account? Login <a href="loginpage.php" class="now-button">here</a>. </legend>
    </fieldset>
</form>




<div class="footer">
    <div class="contact-info">
        <h2 class="contact-heading">Contact Us</h2>
        </div>
</div>

<div class="contact-info">
    <p>tangle@gmail.com</p>
    <p>0113 123 456</p>
</div>

</body>
</html>

