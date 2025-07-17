<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tangle - Live Session </title>
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

        h1 {
            color: #de904b;
            font-family: 'Capriola', sans-serif;
        }

        h2{
            color: #5c5c5c;
            font-family: 'Capriola', sans-serif;
        }

        form {
            max-width: 0px;
            margin: 0px auto;
            padding: 0px;
            background-color: white;
            border-radius: 0px;
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

        input[type="ok"] {
            background-color: #de904b;
            color: #fff;
            cursor: pointer;
            font-family: 'Capriola', sans-serif;
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

        .btn:hover {
            background-color: #e8c390;
            color: #5c5c5c;
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
        
        .container {
            display: flex;
            flex-direction: column;
            gap: 5px;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            padding-bottom: 40px;
        }

        .container .btn {
            display: inline-block;
            background-color: #de904b;
            color: white;
            padding: 10px 60px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 30px;
            transition: background-color 0.3s;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            font-family: 'Capriola', sans-serif;
        }

        .popup {
            width: 600px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 50% !important;
            left: 50%;
            transform: translate(-50%, -30%) scale(0.1);
            text-align: center;
            padding: 0 30px 30px;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }

        .open-popup {
            visibility:visible;
            top: 60%;
            transform: translate(-50%, -50%) scale(1);            
        }

        .popup img {
            width: 100px;
            margin-top: -50px;  

        }

        .popup h2 {
            font-size: 25px;
            font-weight: 500;
            margin: 10px 0;
        }

        .contformat {
            display: inline-block;
        }

        .timerimg {
            display: flex;
            justify-content: center;
        }

        .timerimg img {
            height: 450px;
            width: 450px;
        }

        .dateandtime{
            display: center;
            justify-content: center;
            text-align: center;
            color: #5c5c5c;
        }

        .time {
            justify-content: center;
            display: center;
            text-align: center;            
        }
        .brtimer{
            font-size: 50px;
        }
    
        #breakPopup .btn {
            background-color: #de904b;
            color: white;
            padding: 10px 60px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 30px;
            transition: background-color 0.3s;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            font-family: 'Capriola', sans-serif;
        }
        #breakPopup .btn {
            background-color: #de904b;
            color: #f0d0a5;
            padding: 10px 50px; /* was 10px 60px */
            border-radius: 6px;
            text-decoration: none;
            font-size: 20px; /* was 30px */
            transition: background-color 0.3s;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            font-family: 'Capriola', sans-serif;
        }

#gameArea {
    position: relative;
    width: 500px; /* was 600px */
    height: 300px; /* was 400px */
    background-color: #f5e5db;
    overflow: hidden;
    margin: 40px auto; /* was 50px */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.fruit {
    position: absolute;
    cursor: pointer;
}

.fruit[src*="orange"] {
    width: 40px;
    height: 40px;
}

.fruit[src*="banana"] {
    width: 60px;
    height: 60px;
}

#score, #timer, #gameOver {
    text-align: right;
    margin-top: 0px; /* was 10px */
    font-size: 30px; /* was 40px */
    padding-left: 20px; /* was 30px */
    padding-right: 20px; /* was 30px */
    color: #5c5c5c !important;
    font-weight: 500 !important;
    font-family: 'Capriola', sans-serif;
}

#gameOver {
    display: none;
    font-size: 14px; /* was 24px */
    color: red;
}

#lives img {
    width: 20px; /* was 30px */
    height: 20px;
    margin: 0 5px;
    display: left;
    align-items: left;
    display: inline-block;
}

#startButton {
    display: left;
    margin: 10px auto; /* was 20px */
    padding: 10px 10px; /* was 10px 20px */
    font-size: 20px; 
    font-family: 'Capriola', sans-serif;
    background-color: #f5e5db;
    border: 2px solid #5c5c5c;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
  

</style>        
</head>
        <body>
            
<div class="banner">
    <img src="orangelogo.png" alt="Tangle Logo">
    <h1 style="margin-left: 20px;"><i>Tangle</i></h1>
</div>

<div class="back-button">
    <a href="dashboard.php">
        <img src="left-arrow.png" alt="Back" style="width: 30px; height: auto;">
    </a>
</div>

<h2>
  <div class="dateandtime">
    <?php echo date("l d F Y"); ?>
  </div>
</h2>

<?php
$currentTime = date("H:i");
?>

<h2>
  <div class="dateandtime">
    <?php echo $currentTime; ?>
  </div>
</h2>


<div class="time" style="font-size: 40px; margin-bottom: 20px;">00:00:00</div>

<div class="time" id="studyTimeDisplay">00:00:00</div>

<div class="container">
    <div class="timerimg">
<img src="timer.png">
    </div>
    <div class="contformat">
    <button type="button" class="btn" id="start">Start</button>
    <button type="button" class="btn" id="stop">Pause</button>
    <button type="button" class="btn" id="reset" onClick="openPopup()">End</button>
</div>
<form id="sessionForm" action="insertsession.php" method="POST">
    <input type="hidden" name="start_time" id="start_time">
    <input type="hidden" name="end_time" id="end_time">
    <input type="hidden" name="duration" id="duration">
    <div class="popup" id="popup">
        <img src="partypopper.png">
        <h1>Nice Job!</h1>
        <h2>
            Session Start: <span id="startTime">--:--</span><br>
            Session End: <span id="endTime">--:--</span><br>
            Total Session Time: <span id="totalTime">--:--</span><br><br>
    </br><button type="submit" name="okSubmit" class="btn"  onclick="fillForm()">O.K!</button>
        </h2>
    </div>
</form>
</h2>
    </div>
    </div>

    

    <div class="popup" id="breakPopup">
        <img src="juicebox.png">
        <h1>Break!</h1>
        <span id="breakClock" class="brtimer">--:--</span><br>
        <h2>
            Take 5 and refresh! <br>
            Dont forget to stay hydrated!<br><br>
            <div id="gameArea"><div id="lives" class="pagetitle"></div>

            <div id="score" >Score: 0</div>
            <div id="timer">Time Left: 60</div>
            <div id="gameOver">Game Over!</div>
            </div>
<button id="startButton" name="startbutton">Start Game</button></br>
            <button class="btn" onclick="closeBreakPopup()">Skip Break</button>
        </h2>
    </div>


<script>
    let popup = document.getElementById("popup");

    function openPopup(){
        let popup = document.getElementById("popup");
        popup.classList.add("open-popup");
        
    }

    let breakPopup = document.getElementById("breakPopup");

    function openBreakPopup() {
        breakPopup.classList.add("open-popup");
        resetGame();
        countdownSeconds = 300;
        resetBreakCountdown();
        startBreakCountdown(); 
    }

    function closeBreakPopup() {
        breakPopup.classList.remove("open-popup");
        clearInterval(breakCountdownInterval);
        breakCountdownInterval = null;

        resetGame();
        document.getElementById("startButton").style.display = "inline-block";
        resume();
    }
</script>


<script>
    var time_ele = document.getElementsByClassName("time")[0];
    var start_btn = document.getElementById("start");
    var stop_btn = document.getElementById("stop");
    var end_btn = document.getElementById("reset");

    let seconds = 0;
    let interval = null;
    let sessionStart = null;
    let sessionEnd = null;

    let countdownSeconds = 60; //Changed for testing purposes
    let countdownInterval = null;
    let studyTimeDisplay = document.getElementById('studyTimeDisplay');
    let breakCountdownSeconds   = 300;
    let breakCountdownInterval  = null;

    start_btn.addEventListener("click", start);
    stop_btn.addEventListener("click", stop);
    end_btn.addEventListener("click", endSession);

    function timer() { //Function for main session timer
        seconds++;
        let hrs = Math.floor(seconds / 3600);
        let mins = Math.floor((seconds % 3600) / 60);
        let sec = seconds % 60;

        if (sec < 10) sec = '0' + sec;
        if (mins < 10) mins = '0' + mins;
        if (hrs < 10) hrs = '0' + hrs;

        time_ele.innerHTML = `${hrs}:${mins}:${sec}`;
    }

    function start() { // Function for start
        if (interval) return;
        sessionStart = new Date();
        document.getElementById("startTime").textContent = sessionStart.toLocaleTimeString();
        interval = setInterval(timer, 1000);
        startCountdown();
    }

    function stop() { // Function for stopping both timers
        clearInterval(interval);  // Stop session timer
        interval = null;
        pauseCountdown();         // Pause session countdown
    }

    function resume() { // Function for resume
    if (!interval) {
        interval = setInterval(timer, 1000);  // Resume session timer
    }
    if (!countdownInterval) {
        countdownSeconds = 60;              
        studyTimeDisplay.textContent = '1:00';
        countdownInterval = setInterval(countdownTimer, 1000);  // Resume countdown
    }
    }

    function endSession() {
        stop();
        sessionEnd = new Date();
        document.getElementById("endTime").textContent = sessionEnd.toLocaleTimeString();

        let totalMilliseconds = sessionEnd - sessionStart;
        let totalSeconds = Math.floor(totalMilliseconds / 1000);
        let hrs = Math.floor(totalSeconds / 3600);
        let mins = Math.floor((totalSeconds % 3600) / 60);

        document.getElementById("totalTime").textContent = `${hrs} hrs ${mins} minutes`;

        openPopup();
    }

    function countdownTimer() {
        countdownSeconds--;
        let mins = Math.floor(countdownSeconds / 60);
        let sec = countdownSeconds % 60;

        if (sec < 10) sec = '0' + sec;
        if (mins < 10) mins = '0' + mins;

        studyTimeDisplay.innerHTML = `${mins}:${sec}`;

        if (countdownSeconds <= 0) { // When timer hits 0, execute pause countdown, stop and open the break popup
            pauseCountdown();
            stop();  
            openBreakPopup(); 
        }
    }

    function startCountdown() { // Function for begining the BreakCountdown onclick
        if (countdownInterval) return;
        countdownInterval = setInterval(countdownTimer, 1000);
    }

    function pauseCountdown() {
        clearInterval(countdownInterval);
        countdownInterval = null;
    }

    function resetCountdown() {
        clearInterval(countdownInterval);
        countdownInterval = null;
        countdownSeconds = 60;
        studyTimeDisplay.innerHTML = '1:00';
    }

    function openPopup() {
        let popup = document.getElementById("popup");
        popup.classList.add("open-popup");
    }
    

    function startBreakCountdown() {
        if (breakCountdownInterval) return;  // Prevent multiple intervals
        breakCountdownInterval = setInterval(breakCountdown, 1000);  // Start break countdown
    }

    function breakCountdown() {
        breakCountdownSeconds--; // Decrease the remaining break time by 1 second
        let mins = Math.floor(breakCountdownSeconds / 60);  // Calculate minutes and seconds from the remaining time
        let sec = breakCountdownSeconds % 60;

        if (sec < 10) sec = '0' + sec;
        if (mins < 10) mins = '0' + mins;
        

        document.getElementById("breakClock").innerHTML = `${mins}:${sec}`;   // Update the on-screen timer during the break

        if (breakCountdownSeconds <= 0) {
            clearInterval(breakCountdownInterval); 
            breakCountdownInterval = null;
            closeBreakPopup();  // Close break popup when the break is over
            resume();  // Resume main session timer
        }
    }
    function resetBreakCountdown() {
    clearInterval(breakCountdownInterval); // Stop and clear any existing break countdown interval
    breakCountdownInterval = null;

    breakCountdownSeconds = 300;

    document.getElementById("breakClock").textContent = '05:00';
}

    function fillForm() {
        const fmt = d => d.toISOString().slice(0,19).replace("T"," ");
        const form = document.getElementById("sessionForm");

        form.start_time.value = fmt(sessionStart);
        form.end_time.value   = fmt(new Date());
        form.duration.value   = Math.round((Date.now() - sessionStart.getTime())/60000);
    }

    
</script>

<script>
  let score = 0;
let timeLeft = 60;
let gameRunning = true;
let lives = 5;

const gameArea = document.getElementById("gameArea");
const scoreDisplay = document.getElementById("score");
const timerDisplay = document.getElementById("timer");
const gameOverDisplay = document.getElementById("gameOver");
const livesDisplay = document.getElementById("lives");

const fruits = ["gameorange.png", "gamebanana.png"];

function updateLivesDisplay() {
  livesDisplay.innerHTML = "";
  for (let i = 0; i < lives; i++) {
    const star = document.createElement("img");
    star.src = "star.png";
    livesDisplay.appendChild(star);
  }
}

function createFruit() {
  if (!gameRunning) return;

  const fruit = document.createElement("img");
  fruit.classList.add("fruit");
  fruit.src = fruits[Math.floor(Math.random() * fruits.length)];
  fruit.style.left = Math.random() * (gameArea.offsetWidth - 40) + "px";
  fruit.style.top = "-40px";

  // Click to collect
  fruit.addEventListener("click", () => {
    if (!gameRunning) return;
    score++;
    scoreDisplay.textContent = `Score: ${score}`;
    gameArea.removeChild(fruit);
  });

  gameArea.appendChild(fruit);
  moveFruit(fruit);
}

function moveFruit(fruit) {
  let fruitPosition = -40;

  const fallInterval = setInterval(() => {
    if (!gameRunning) {
      clearInterval(fallInterval);
      return;
    }

    fruitPosition += 2;
    fruit.style.top = fruitPosition + "px";

    if (fruitPosition > gameArea.offsetHeight) {
      gameArea.removeChild(fruit);
      clearInterval(fallInterval);
      loseLife();
    }
  }, 20);
}

function loseLife() {
  lives--;
  updateLivesDisplay();
  if (lives <= 0) {
    endGame();
  }
}

function startTimer() {
  const timerInterval = setInterval(() => {
    timeLeft--;
    timerDisplay.textContent = `Time Left: ${timeLeft}`;
    if (timeLeft <= 0 || !gameRunning) {
      clearInterval(timerInterval);
      endGame();
    }
  }, 1000); 
}

function startGame() {
  startTimer(); // On start game start timer
  const fruitInterval = setInterval(() => { // Dont spawn if game isnt running
    if (!gameRunning) {
      clearInterval(fruitInterval);
      return;
    }
    createFruit(); // Creating new fruit
  }, 800); // Fruit Spawn Rate
}

function endGame() {
  gameRunning = false; // sets the game running to false
  gameOverDisplay.style.display = "block";

  document.querySelectorAll('.fruit').forEach(fruit => fruit.remove()); //Extra for clearing the game area once game over.
}

document.getElementById("startButton").addEventListener("click", () => {
  document.getElementById("startButton").style.display = "none";
  resetGame(); // Calls to reset when the button is clicked
  startGame(); // Starts the game shortly after
}
);
function resetGame() {
    // Reset game variables
    score = 0;
    timeLeft = 60;
    lives = 5;
    gameRunning = true;

    // Reset the score and time left displays
    scoreDisplay.textContent = `Score: ${score}`;
    timerDisplay.textContent = `Time Left: ${timeLeft}`;
    updateLivesDisplay(); // Reset the stars (lives)

    // Hide the "Game Over" display (if visible)
    gameOverDisplay.style.display = "none";


    // Remove any remaining fruits on the screen
    document.querySelectorAll('.fruit').forEach(fruit => {
        fruit.remove();
    });
}
</script>

</body>
</html>

<div class="footer">
    <div class="contact-info">
        <h1 class="contact-heading">Contact Us</h1>
    </div>
</div>

<div class="contact-info">
    <p>tangle@gmail.com</p>
    <p>0113 123 456</p>
</div>