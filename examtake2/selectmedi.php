<?php
// basic form template 
// allows links to the keywords
include 'connection.php';

echo '<h2>Select ALL from the Medicines Table</h2>';
$query = "SELECT * FROM Medicines";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo 'Medi Name: ' . $row['mediName'] . '</br> Dose: ' . $row['mediDose'] . '</br> Frequency: ' . $row['mediFrequency'] . '<br /> </br>';
}
?>