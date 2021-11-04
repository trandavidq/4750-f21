<?php
//Initialize DB properties
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Notemates';

//Create connection to database
$conn = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

//Error handling
if(mysqli_connect_errno()){
    echo "Failed to connect to DB";
}
else{
    echo "Connected to DB!" . "</br>";
}
?>