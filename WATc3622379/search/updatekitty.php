<?php
include 'init.php';

$id = $_POST['PetId'];
$petName = $_POST['petName'];
$price = $_POST['price'];
$breed = $_POST['breed'];
$age = $_POST['age'];
$info = $_POST['info'];
$imageFilename = $_POST['imageFilename'];

$query = "UPDATE Adoption SET PetName='$petName', PetPrice='$price', PetCatagory='$breed', PetAge='$age', PetInfo='$info', PetImage='$imageFilename' WHERE PetId='$id'";
$result = mysqli_query($connection, $query);

if ($result) {
    header("Location: protected.php");
    exit();
} else {
    echo "Error updating record: " . mysqli_error($connection);
}
?>

