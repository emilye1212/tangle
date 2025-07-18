<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warden - Create Account</title>
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
            padding: 40px;
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

    </style>
</head>
<body>

<div class="banner">
<img src="wardenlogo.png" alt="Warden Logo">
    <h1 style="margin-left: 20px;"><i>Warden</i></h1>
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

        <input type="reset" value="Clear"/>        
        </br><input type="submit" name="submit" value="Continue"/>
    </fieldset>
</form>

<div class="back-button">
    <p><a href="homepage.php">Back</a></p>
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

