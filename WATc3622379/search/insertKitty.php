<?php
include 'init.php';

if(isset($_POST['loginSubmit'])) {
    $petName = $_POST['petName'];
    $price = $_POST['price'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $info = $_POST['info'];
    $imageFilename = $_POST['imageFilename'];


    if (!is_numeric($price)) {
        echo "ERROR: Price must be numerical.";
        exit();
    }

    $query = "INSERT INTO Adoption (PetName, PetPrice, PetCatagory, PetAge, PetInfo, PetImage) VALUES ('$petName', '$price', '$breed', '$age', '$info', '$imageFilename')";
    $result = mysqli_query($connection, $query);

    if($result) {
        echo "Record inserted successfully.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "ERROR: Could not able to execute query. " . mysqli_error($connection);
    }    

} else {
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit(); 
}
?>
