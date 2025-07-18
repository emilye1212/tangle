<?php
include 'connnection.php';

    echo '<h2>Select ALL from the Pizza Table</h2>';
    $query = "SELECT * FROM Pizza";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo 'Pizza Name: ' . $row['pizzaName'] . '</br> Catagory: ' . $row['pizzaCatagory'] . '</br> Price: ' . $row['pizzaPrice'] . '<br /> </br>';
}
?>