<?php
// import.php — quick one‑time loader
$host     = 'tangleserver.mysql.database.azure.com';
$user     = 'adminuser@tangleserver';
$pass     = 'Password12345!';
$options  = [MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT];

$mysqli = mysqli_init();
mysqli_ssl_set($mysqli, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect(
  $mysqli,
  $host,
  $user,
  $pass,
  '',
  3306,
  NULL,
  MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT
);

if ($mysqli->connect_error) {
    die("Connect failed: " . $mysqli->connect_error);
}

// List of dumps to import
$dumps = ['Credentials.sql', 'study_sessions.sql'];

foreach ($dumps as $dump) {
    $sql = file_get_contents(__DIR__ . "/$dump");
    if (!$mysqli->multi_query($sql)) {
        die("Error importing $dump: " . $mysqli->error);
    }
    // flush any extra result sets
    while ($mysqli->more_results() && $mysqli->next_result()) {;}
    echo "Imported $dump successfully\n";
}

$mysqli->close();
echo "✅ All imports done!";

