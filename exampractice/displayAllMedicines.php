<?php
include 'connnection.php';

    echo '<h2>Select ALL from the Animals Table</h2>';
    $query = "SELECT * FROM Animals";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo 'Pet Name: ' . $row['PetName'] . '</br> Age: ' . $row['Age'] . '</br> Breed: ' . $row['Breed'] . '<br /> </br>';
    }
?>
