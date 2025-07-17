<?php
include 'init.php';        
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['userId'])) {
    header("Location: loginpage.php");
    exit();
}

if (isset($_POST['okSubmit'])) {

    if (!isset($_SESSION['userId']) || !is_numeric($_SESSION['userId'])) {
        header("Location: loginpage.php");
        exit();
    }

    $userId   = $_SESSION['userId'];       
    $start    = $_POST['start_time'];         
    $end      = $_POST['end_time'];
    $duration = $_POST['duration'];

    $duration = isset($_POST['duration']) ? (int)$_POST['duration'] : 0;
    
    if ($duration <= 0) {
        header("Location: dashboard.php?error=session_too_short");
        exit();
    }

    $query = "INSERT INTO study_sessions (userId,  startTime,  endTime,  durationMinutes) VALUES ('$userId','$start','$end','$duration')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: dashboard.php?saved=1");
        exit();
    } else {
        echo "DB error: " . mysqli_error($connection);
    }

} else {
    header("Location: dashboard.php");
    exit();
}
?>
