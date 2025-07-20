<?php
$mysqli = new mysqli(
  'tangleserver.mysql.database.azure.com',
  'adminuser@tangleserver',
  'Password12345!',
  'Credentials'
);
if ($mysqli->connect_error) {
    die("Connect failed: " . $mysqli->connect_error);
}
$sql = file_get_contents(__DIR__ . '/Credentials.sql');
if ($mysqli->multi_query($sql)) {
    do {} while ($mysqli->more_results() && $mysqli->next_result());
    echo "✅ Import complete!";
} else {
    echo "❌ Import error: " . $mysqli->error;
}