<?php
include 'init.php';

if(!isset($_SESSION['user'])){
    header('Location: sessions.php');
    exit();
}

if(isset($_POST['loginSubmit'])) {
    $petName = $_POST['petName'];
    $price = $_POST['price'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $info = $_POST['info'];
    $imageFilename = $_POST['imageFilename'];

    $query = "INSERT INTO Adoption (PetName, PetPrice, PetCatagory, PetAge, PetInfo, PetImage) VALUES ('$petName', '$price', '$breed', '$age', '$info', '$imageFilename')";
    $result = mysqli_query($connection, $query);

    if($result) {
        echo "Record inserted successfully.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "ERROR: Could not able to execute query. " . mysqli_error($connection);
    }    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Protected Page</title>
</head>
<body>

    <h1>Welcome to the Admin Maintenance Page</h1>
    <a href="sessions.php">My Account</a>
    <a href="logout.php">Logout</a>

    <h2>Input records below:</h2>

    <form method="post">
        <fieldset>
            <legend>Enter New Cat Details</legend>
            <label for="petName">Name:</label><br>
            <input type="text" name="petName"><br>

            <label for="price">Price:</label><br>
            <input type="text" name="price"><br>

            <label for="breed">Breed:</label><br>
            <input type="text" name="breed"><br>

            <label for="age">Age:</label><br>
            <input type="text" name="age"><br>

            <label for="info">Info:</label><br>
            <input type="text" name="info"><br>        

            <label for="imageFilename">Image Filename:</label><br>
            <input type="text" name="imageFilename"><br>

            <input type="submit" value="Submit" name="loginSubmit">
            <input type="reset" value="Clear">
        </fieldset>
    </form>

    <h2>Alter records below: </h2> 

    <?php
    $query = "SELECT * FROM Adoption";
    $result = mysqli_query($connection, $query);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Name: </th>";
    echo "<th>Price: </th>";
    echo "<th>Breed: </th>";
    echo "<th>Age: </th>";
    echo "<th>Info: </th>";
    echo "<th>Image: </th>";
    echo "<th>Amend </th>";
    echo "<th>Archive </th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['PetName'] . "</td>";
        echo "<td>" . $row['PetPrice'] . "</td>";
        echo "<td>" . $row['PetCatagory'] . "</td>";
        echo "<td>" . $row['PetAge'] . "</td>";
        echo "<td>" . $row['PetInfo'] . "</td>";
        echo "<td><img src='./kittypics/" . $row['PetImage'] . "' width='100' height='100'></td>";

        echo "<td><a href='updatekitty.php?PetId=" . $row['PetId'] . "'>Amend</a></td>"; 
        echo "<td><a href='archivekitty.php?PetId=" . $row['PetId'] . "'>Archive</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
