<?php
session_start();
session_destroy();
header('location:firstpage.php');
exit();
?>