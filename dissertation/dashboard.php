<?php
include 'init.php';

if (empty($_SESSION['userId'])) {
    header("Location: loginpage.php");
    exit();
}

$userId = $_SESSION['userId'];
$query = "SELECT * FROM study_sessions WHERE userId = $userId AND YEARWEEK(createdAt, 1) = YEARWEEK(CURDATE(), 1)";
$result = mysqli_query($connection, $query);

$weekData = array_fill(0, 7, 0);
$totalMinutes = 0;

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dayIndex = date('N', strtotime($row['createdAt'])) - 1;
        $duration = (int)$row['durationMinutes'];
        $weekData[$dayIndex] += $duration;
        $totalMinutes += $duration;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tangle - Dashboard</title>
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
            color: #5c5c5c;
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
            padding-top: 40px;
        }

        .contact-info {
            padding-left: 400px;
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
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
            margin-top: 10px !important;
            margin-bottom: 10px !important;
            margin-left: 400px !important;
            text-align: left;
            width: 1400px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .box h2 {
            color: #fff;
            margin-top: 0;
            padding-top: 0;
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
        
        .welcome-message {
            text-align: right;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-right: 50px;
            font-size: 50px;
        }

        .button-color {
            color: #d98d6c;
            margin-left: 30px;
        }

        .button-black {
            color: #5c5c5c !important;
            font-family: 'Capriola', sans-serif;
            display: block;
            padding: 10px;
            border-radius: 4px;
            padding-top: 360px;
            font-size: 20px !important;
        }
        .button-black:hover {
            text-decoration: underline;
        }
        .plussign img {
            width: 30px;
            height: auto;
            margin-left: 50px;
        }
        .sidebar{
            position:fixed;        
            top:90px;              
            left:0;
            width:250px;           
            height:calc(100% - 90px);
            background:#fff;
            box-shadow:2px 0 5px rgba(0,0,0,.2);
            padding:20px 15px;
            display:flex;
            flex-direction:column;
            padding-left: 30px;
        }
        .sidebar a{
            color:#de904b;
            text-decoration:none;
            margin:10px 0;
            font-size:1.05em;
        }
        .sidebar a:hover {
            color:#d98d6c;
        }
        .dateandtime{
            display: center;
            justify-content: center;
            text-align: right;
            padding-right: 90px;
            color: #5c5c5c !important;
            gap: 20px !important;
        }
        .dateandtime h2 {
            margin: 0;
            color: #5c5c5c !important;
        }

        .box h1 {
            color: black;
            vertical-align: center;
            
        }
        .box h2 {
            color: #5c5c5c;
            vertical-align: center;
            padding-top: 20px !important;
            padding-left: 20px;        
        } 
        .graph-section {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 40px auto;
            width: 90%;
        }

        .graph-container {
            width: 60%;
            height: 300px;
        }

        .total-time-box {
            width: 30%;
            height: 300px;
            background-color: #fff;
            color: #d98d6c;
            font-size: 24px;
            text-align: center;
            padding: 30px;
            border-radius: 20px;
           
}
        </style>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.9/dist/chart.umd.min.js"></script>

<script>
    const durations = <?php echo json_encode($weekData); ?>;
    const totalMinutes = <?php echo $totalMinutes; ?>;

    document.addEventListener("DOMContentLoaded", function() {
        const labels = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
        const hours = Math.floor(totalMinutes / 60); // Converts the total minutes into hours by dividing by 60 and rounding down
        const minutes = totalMinutes % 60;  // Calculates the remaining minutes after converting to hours.

        document.getElementById("totalTime").innerText = `${hours} hr${hours !== 1 ? 's' : ''} ${minutes} min`;

        new Chart(document.getElementById('weeklyChart'), {
            type: 'line',
            data: {
                labels: labels,  // Sets the x-axis labels to the days of the week defined earlier.
                datasets: [{
                    label: 'Minutes Studied',      // Sets the label
                    data: durations,
                    borderColor: '#de904b',     // Sets the colour
                    backgroundColor: 'rgba(222,144,75,0.2)',
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#de904b',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Ensures the y-axis starts from zero
                    }
                }
            }
        });
    });
</script>



<div class="banner">
    <img src="orangelogo.png" alt="Tangle Logo">
    <h1 style="margin-left: 20px;"><i>Tangle</i></h1> 
    <div class="datetime" id="datetime"></div>
</div>


<div class="sidebar">
    <h2><a class="button-color" href="newsession.php">Start Session</a></h2>
    <h2><a class="button-color" href="sessionlog.php">Session Logs</a></h2>
    <h2><a class="button-color" href="communities.php">Communities</a></h2>
    <h2><a class="button-color" href="gamecenter.php">Game Center</a></h2>
    <h2><a class="button-color" href="settings.php">Settings</a></h2>
    <h2> <a class="button-black" href="logout.php">Logout</a></h2>
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

    if (isset($_SESSION['firstname'])) {
        $name = $_SESSION['firstname'];

        $currentTime = date('H:i');
    
        if ($currentTime < 12) {
            echo "<div class='welcome-message'>Good Morning, $name! ☀️</div>";
        } elseif ($currentTime >= 12 && $currentTime < 18) {
            echo "<div class='welcome-message'>Good Afternoon, $name! ☀️</div>";
        } else {
            echo "<div class='welcome-message'>Good Evening, $name! 🌙</div>";
        }
    } else {
        echo "<div>Session not set</div>";
        include 'loginprocess.php';
    
        if (isset($_SESSION['error'])) {
            echo "<div class='error-message'>Error message: " . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
    }

    ?>

<div class="dateandtime">
    <h2><?php echo date("l d F Y"); ?></h2>
    <h2><?php echo date("H:i"); ?></h2>
</div>


<div class="box">
    <h2>Your Dashboard</h2>
    <p1>
    <div class="graph-section">
    <div class="graph-container">
        <canvas id="weeklyChart"></canvas>
    </div>
    <div class="total-time-box">
        <h2>Total Study Time This Week</h2>
        <p id="totalTime">Calculating...</p>
    </div>
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

</body>
</html>