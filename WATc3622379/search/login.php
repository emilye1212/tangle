<?php
session_start();
include 'init.php';

if(isset($_POST['subLogin'])){
    $username = $_POST['txtUser'];
    $password = $_POST['txtPass'];
}

$query = "SELECT * FROM Staff WHERE StaffName = '$username' AND StaffPass = '$password'";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['user'] = $username;
    header('location: sessions.php');
} else {
    $_SESSION['error'] = 'User not recognised';
    header('location: sessions.php');
}
?>
