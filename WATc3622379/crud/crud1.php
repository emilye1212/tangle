<?php
include 'connection.php';
?>

<h1>Manage Products</h1>

<form method="post" action="insertProduct.php">
    <fieldset>
        <legend>Enter New Product Details</legend>
        <label for="productName">Product Name:</label><br>
        <input type="text" name="productName"><br>

        <label for="price">Price:</label><br>
        <input type="text" name="price"><br>

        <label for="imageFilename">Image Filename:</label><br>
        <input type="text" name="imageFilename"><br>

        <input type="submit" value="Submit" name="loginSubmit">
        <input type="reset" value="Clear">
    </fieldset>
</form>


<?php
include 'displayProducts.php';
?>

