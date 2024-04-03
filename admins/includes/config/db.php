<?php
// Database configuration
$hostName = 'localhost'; // Hostname
$dbUser = 'root'; // Database name
$dbpassword = "";
$dbName ="admins";
$conn = mysqli_connect($hostName, $dbUser, $dbpassword, $dbName);
if (!$conn) {
    die("Connection failed: " . $e->getMessage());
}
?>
