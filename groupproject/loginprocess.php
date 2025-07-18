<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'init.php';

if(isset($_POST['submit'])){
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $query = "SELECT * FROM Credentials WHERE emailAd = '$email' AND  userPassword = '$password'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $row['firstName']; 
            header('location: account.php');
            exit();
        } else {
            $_SESSION['error'] = 'User not recognised';
            header('location: homepage.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Query failed: ' . mysqli_error($connection);
        header('location: homepage.php');
        exit();
    }
}
?>


