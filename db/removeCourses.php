<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';
session_start();

$userID = $_SESSION['userID'];
$courseName = $_POST['courseName'];

$remove_course_query = $conn->prepare("DELETE FROM takes WHERE userID = ? AND courseID = ? ");
$remove_course_query->bind_param("ss",$userID,$courseName);
$remove_course_query->execute();

header('Location: ../views/courses.php');
die;
?>