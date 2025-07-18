
<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $query = "INSERT INTO Customer (firstName, lastName, email, `password`, gender, age) VALUES ('$firstName', '$lastName', '$email', '$password', '$gender', '$age')";
    if(mysqli_query($connection, $query)){
        echo "Record inserted successfully.";
    } else{    
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
}
?>

