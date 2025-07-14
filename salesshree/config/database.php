<?php
// Database configuration
$host = "localhost";
$user = "u776627341_sales_crm"; // change as needed
$password = "GTCSsales40#@"; // change as needed
$database = "u776627341_sales_crm";

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
