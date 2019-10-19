<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '12345';
$dbName = 'mydb';

//Create connection and select DB
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}
?>