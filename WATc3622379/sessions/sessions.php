<?php
session_start();
include 'init.php';


if(isset($_SESSION['user'])) {
    echo "Welcome, ".$_SESSION['user']."!</br></br>";
    echo "<a href='protected.php'>Protected Page</a> | <a href='logout.php'>Logout</a>";
} else {
    include 'loginform.php';
 
    if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}
?>