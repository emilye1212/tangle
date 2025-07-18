<?php
include 'connection.php';

$id=$_GET['id'];
$query = "DELETE FROM Products WHERE ProductID = '$id'";

mysqli_query($connection, $query);

if (mysqli_affected_rows($connection) > 0) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error in query: $query. " . mysqli_error($connection);
} 
?>
