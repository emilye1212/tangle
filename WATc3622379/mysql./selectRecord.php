<?php

include 'connection.php';

echo '<h2>Select ALL from the Customer Table</h2>';
$query = "SELECT * FROM Customer";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].'<br />';
}

echo '<h2>Select ALL from the customer table with Age >22</h2>';
$query = "SELECT * FROM Customer WHERE Age > 22";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}

echo '<h2>Select ALL from the customer table with age >=22</h2>';
$query = "SELECT * FROM Customer WHERE Gender = 'f' AND Age >= 22";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}

echo '<h2>Select ALL from the customer table list by age descending</h2>';
$query = "SELECT * FROM Customer WHERE Gender = 'm' ORDER BY Age DESC";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['FirstName'].'' .$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}

echo '<h2>Select ALL from the customer table with "a" in the first name</h2>';
$query = "SELECT * FROM Customer WHERE FirstName LIKE '%a%'";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.$row['Age'].'<br />';
}


?>