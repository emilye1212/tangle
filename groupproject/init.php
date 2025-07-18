<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$hostname = 'stu-db.aet.leedsbeckett.ac.uk';
$username = 'c3622379'; 
$password = 'MyDB02013522';
$databaseName = 'c3622379';
$connection = mysqli_connect($hostname, $username, $password, $databaseName);

if (!$connection) {
    exit("Unable to connect to database!");
}
?>