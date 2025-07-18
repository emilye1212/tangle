<?php
include 'connection.php';

$query = "SELECT * FROM Products";
$result = mysqli_query($connection, $query);

echo "<table border='1'>";
echo "<tr>";
echo "<th>Product Name</th>";
echo "<th>Product Price</th>";
echo "<th>Product Image</th>";
echo "<th>Amend</th>";
echo "<th>Delete</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['ProductName'] . "</td>";
    echo "<td>" . "£" . $row['ProductPrice'] . "</td>";
    echo "<td><img src='./images/" . $row['ProductImageName'] . "' width='100' height='100'></td>";

    echo "<td><a href='amendProduct.php?id=" . $row['ProductID'] . "'>Amend</a></td>"; 
    echo "<td><a href='deleteProduct.php?id=" . $row['ProductID'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
?>