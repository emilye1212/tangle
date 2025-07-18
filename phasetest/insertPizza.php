<?php

include 'connection.php'; 

if (isset($_POST['subPizza'])) { // linking labels to keywords 
    $pizzaName = $_POST['txtName'];
    $pizzaCat = $_POST['txtCat'];
    $pizzaPrice = $_POST['txtPrice'];
    
    //sql insert into query, links table to keywords
    $query = "INSERT INTO Pizza (txtName, txtCat, txtPrice) VALUES ('$pizzaName', '$pizzaCat', '$pizzaPrice')";
    if(mysqli_query($connection, $query)){
        echo "Record inserted successfully."; // my error handling code for input
    } else{    
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
?>