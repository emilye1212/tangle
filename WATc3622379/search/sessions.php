<?php
session_start();
include 'init.php';


if(isset($_SESSION['user'])) {
    echo "Welcome, ".$_SESSION['user']."!</br></br>";
    echo "<a href='protected.php'>Admin Maintenance</a> | <a href='newEmployee.php'>Employee Register</a> | <a href='logout.php'>Logout</a>";
} else {
    include 'adminLogin.php';
 
    if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}
?>