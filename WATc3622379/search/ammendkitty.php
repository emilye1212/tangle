<?php
include 'init.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['PetId'];
$query = "SELECT * FROM Adoption WHERE PetId = '$id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>

<form method="post" action="updatekitty.php">
    <fieldset>
        <legend>Amend Kitty Details</legend>
        <label for="petName">Name:</label><br>
        <input type="text" name="petName" value="<?php echo $row['PetName']; ?>"><br>
        
        <label for="price">Price:</label><br>
        <input type="text" name="price" value="<?php echo $row['PetPrice']; ?>"><br>
        
        <label for="breed">Breed:</label><br>
        <input type="text" name="breed" value="<?php echo $row['PetCatagory']; ?>"><br>

        <label for="age">Age:</label><br>
        <input type="text" name="age" value="<?php echo $row['PetAge']; ?>"><br>

        <label for="info">Info:</label><br>
        <input type="text" name="info" value="<?php echo $row['PetInfo']; ?>"><br>            

        <label for="imageFilename">Image Filename:</label><br>
        <input type="text" name="imageFilename" value="<?php echo $row['PetImage']; ?>"><br>

        <input type="hidden" name="PetId" value="<?php echo $row['PetId']; ?>">

        <input type="submit" value="Submit" name="loginSubmit">
    </fieldset>
</form>


