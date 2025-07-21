<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$hostname = 'tangleserver.mysql.database.azure.com';
$username = 'adminuser@tangleserver'; 
$password = 'Password12345!';
$databaseName = 'tangledatabase';

var_dump([$hostname, $username, $password, $databaseName]);

$connection = mysqli_connect($hostname, $username, $password, $databaseName);

if (!$connection) {
    exit("Unable to connect to database!");
}
?>