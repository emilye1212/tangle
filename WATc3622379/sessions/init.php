<?php

session_start();

$hostname = 'stu-db.aet.leedsbeckett.ac.uk';
$username = 'c3622379'; //your standard uni id
$password = 'MyDB02013522'; // the password found on the W: drive
$databaseName = 'c3622379'; //the name of the db you are using on phpMyAdmin
$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");
//standard and pretty much must include this



?>

