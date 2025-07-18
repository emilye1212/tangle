<?php
session_start();

$hostname = 'stu-db.aet.leedsbeckett.ac.uk';
$username = 'c3622379'; 
$password = 'MyDB02013522';
$databaseName = 'c3622379';
$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");

?>
