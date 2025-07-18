<?php

include 'init.php';

if(!isset($_SESSION['user'])){
    header ('location:sessions.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Protected Page</title>
</head>
<body>

    <h1>Welcome to the Protected Page</h1>
    
    <p>Any page content that you want to protect can be placed here.</p>
    
    <a href="logout.php">Logout</a>
    
</body>
</html>