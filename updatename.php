<?php
include 'init.php'; 
   

if (isset($_POST['submit'])) {
    
    $userId = $_SESSION['userId']; 
    $firstName = $_POST['firstName']; 
    $lastName = $_POST['lastName'];

    if (empty($firstName) || empty($lastName)) {
        echo "Please fill in both first name and last name.<br>";
    } else {
        $query = "UPDATE Credentials SET firstName='$firstName', lastName='$lastName' WHERE userId='$userId'";

        if (mysqli_query($connection, $query)) {
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;

            $_SESSION['update_success'] = "Name updated successfully";                

            header("Location: settings.php");
            exit();
        } else {    
            echo "ERROR: Could not execute query. " . mysqli_error($connection);
        }
    }
}

if (isset($_POST['clear'])) {
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>