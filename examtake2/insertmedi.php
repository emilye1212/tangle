<?php

include 'connection.php'; 

if (isset($_POST['submit'])) { // linking labels to keywords 
    $mediName = $_POST['mediName'];
    $mediDose = $_POST['mediDose'];
    $mediFrequency = $_POST['mediFrequency'];

        //sql insert into query, links table to keywords
    $query = "INSERT INTO Medicines (mediName, mediDose, mediFrequency) VALUES ('$mediName', '$mediDose', '$mediFrequency')";
    if(mysqli_query($connection, $query)){
        echo "Record inserted successfully.";
    } else{    
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
}
?>
