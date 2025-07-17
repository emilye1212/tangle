<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catch the Falling Fruit</title>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">
    <link rel="icon" href="templogo.png" type="image/png">    
    <style>


  body {
    cursor: url("bucket.png");
  }

  #gameArea {
    position: relative;
    width: 600px;
    height: 400px;
    background-color: #f5e5db;
    overflow: hidden;
    margin: 50px auto;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }

  .fruit {
    position: absolute;
    cursor: pointer;
  }

  .fruit[src*="orange"] {
  width: 50px;
  height: 50px;
}

.fruit[src*="banana"] {
  width: 70px;
  height: 70px;
}

  #score, #timer, #gameOver {
  text-align: right;
  margin-top: 10px;
  font-size: 18px;
  padding-left: 30px;
  padding-right: 30px;
  color: #5c5c5c !important;
  font-size: 40px;
  font-weight: 500 !important;
  font-family: 'Capriola', sans-serif;
}

  #gameOver {
    display: none;
    font-size: 24px;
    color: red;
  }

  #lives img {
  width: 30px;
  height: 30px;
  margin: 0 5px;
}
#startButton {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
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
<div id="gameArea"><div id="lives" class="pagetitle"></div>

  <div id="score" >Score: 0</div>
  <div id="timer">Time Left: 60</div>
  <div id="gameOver">Game Over!</div>
</div>
<button id="startButton" name="startbutton">Start Game</button>
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
  updateLivesDisplay();
  startTimer();
  const fruitInterval = setInterval(() => {
    if (!gameRunning) {
      clearInterval(fruitInterval);
      return;
    }
    createFruit();
  }, 800);
}

function endGame() {
  gameRunning = false;
  gameOverDisplay.style.display = "block";
}

document.getElementById("startButton").addEventListener("click", () => {
  document.getElementById("startButton").style.display = "none";
  startGame();
});

</script>

</body>
</html>
