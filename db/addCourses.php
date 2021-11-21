<?php
//This file adds classes to database
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../coursesAPI.php';
session_start();
$courseID= $_POST['subject'];

if(!isset($_SESSION['userID'])){
    echo 'Failure to retrieve ID';
    die;
}
$user_id = $_SESSION['userID'];
//Insert into takes table

$insert_takes_query = $conn->prepare("INSERT INTO takes (userID, courseID) VALUES (?,?);");
$insert_takes_query ->bind_param("ss",$user_id,$courseID);
$insert_takes_query ->execute();
header('Location: ../views/courses.php');
?>