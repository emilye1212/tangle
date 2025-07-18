<?php

include 'connection.php';

$id = $_GET['ProductID'];
echo "ProductID: " . $id;
$query = "SELECT * FROM Products WHERE ProductID = '$id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>


<form method="post" action="updateProduct.php">
    <fieldset>
        <legend>Amend Product Details</legend>
        <label for="productName">Product Name:</label><br>
        <input type="text" name="productName" value="<?php echo $row['ProductName']; ?>"><br>

        <label for="price">Price:</label><br>
        <input type="text" name="price" value="<?php echo $row['ProductPrice']; ?>"><br>

        <label for="imageFilename">Image Filename:</label><br>
        <input type="text" name="imageFilename" value="<?php echo $row['ProductImageName']; ?>"><br>

        <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']; ?>">

        <input type="submit" value="Submit" name="loginSubmit">
        <input type="reset" value="Clear">
    </fieldset>
</form>