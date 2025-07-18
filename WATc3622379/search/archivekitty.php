<?php
include 'init.php';

$id=$_GET['PetId'];
$query = "DELETE FROM Adoption WHERE PetId = '$id'";

mysqli_query($connection, $query);

if (mysqli_affected_rows($connection) > 0) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error in query: $query. " . mysqli_error($connection);
} 
?>
