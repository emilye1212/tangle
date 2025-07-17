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
    <title>Tangle - Session Logs</title>
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
            padding-top: 20px;
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
            background-color: #f5d9c1;
            color: #d98d6c;
            padding: 20px;
            border-radius: 9px;
            margin-bottom: 20px;
            text-align:left;
            padding-left: 30px;
            width: 1200px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .box h2 {
            color: #5c5c5c;
            font-size: 20px;
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

        .back-button {
            text-align: center;
            margin-top: 20px;
        }

        .now-button {
            color: #d98d6c;
        }

        .back-button {
            text-align: start;
            margin-top: 40px;
            margin-bottom: 20px;
            margin-left: 40px;
        }

        .pagetitle {
            padding-left: 30px;
            text-align: center;
            color: #5c5c5c !important;
            font-size: 50px;
            font-weight: 500 !important;
        }
        .mini-box{
            display:flex;        
            justify-content:space-between;
            flex-direction:row-reverse;
            align-items:center;
            padding:18px 24px;
            background:#fff;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,.12);
            margin-bottom:15px;
        }
        .mini-box h1 {
            color: #5c5c5c;
            font-size: 20px;
            margin-bottom: 0px;
        }
        .mini-box h2 {
            color: #d98d6c;
            font-size: 10;
            margin-top: 0px;
        }
        .time-icon{
            width:100px;
            height:100px;
        }
    </style>
</head>
<body>
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

<div class ="pagetitle">Session Logs</div>

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

$query = "SELECT * FROM study_sessions WHERE userId = $userId ORDER BY startTime DESC";
$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query error: ' . mysqli_error($connection));
}


if ($result->num_rows === 0) {
    echo "<p>No sessions recorded yet.</p>";
} else {
    echo "<div class='box'>"; 
    while ($row = $result->fetch_assoc()) {

        $totalMinutes = (int)$row['durationMinutes'];
        $hours   = floor($totalMinutes / 60);
        $minutes = $totalMinutes % 60;

        $durationString = "{$hours} hour"  . ($hours   == 1 ? '' : 's') .
                          " and {$minutes} minute" . ($minutes == 1 ? '' : 's');

        $startTime  = strtotime($row['startTime']);
        $endTime  = strtotime($row['endTime']);
        $startHour  = (int)date("H", $startTime);
        $image      = ($startHour >= 6 && $startHour < 18) ? "sun.png" : "halfmoon.png";
        $createdDate = date("Y-m-d", strtotime($row['createdAt']));
    

        echo "<div class='mini-box'>";
        echo     "<img src='$image' class='time-icon' alt='time of day'>";
        echo     "<div class='session-text'>";
        echo         "<h1>$durationString - $createdDate</h1>";
        echo         "<h1>Start: </h1><h2>" . date("H:i", $startTime) . "</h2>";
        echo         "<h1>End: </h1><h2>" . date("H:i", $endTime) . "</h2>";
        echo     "</div>";
        echo "</div>";
    }
    echo "</div>";
}
?>


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