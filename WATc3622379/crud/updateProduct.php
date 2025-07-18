<?php

include 'connection.php';

$id = $_GET['ProductID'];
$productName = $_POST['productName'];
$price = $_POST['price'];
$imageFilename = $_POST['imageFilename'];

$query = "UPDATE Products SET ProductName='$productName', ProductPrice='$price', ProductImageName='$imageFilename' WHERE ProductID='$id'";
$result = mysqli_query($connection, $query);

if ($result) {
    header("Location: crud.php");
    exit();
} else {
    echo "Error updating record: " . mysqli_error($connection);
}
?>