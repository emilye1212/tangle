<?php

include 'connection.php';

if(isset($_POST['loginSubmit'])) {
    $productName = $_POST['ProductName'];
    $price = $_POST['ProductPrice'];
    $imageFilename = $_POST['ProductImageFilename'];
    $id = $_POST['ProductID'];

    $query = "INSERT INTO Products (ProductName, ProductPrice, ProductImageName) VALUES ('$productName', '$price', '$imageFilename')";
    $result = mysqli_query($connection, $query);

    if($result) {
        echo "Record inserted successfully.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }    

} else {
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit(); 
}
?>
