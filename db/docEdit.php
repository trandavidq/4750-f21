<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
	$courseid = $_POST['courseName'];
	$docName = $_POST['docName'];
	$docDate = $_POST['date'];

	$id = $_POST['documentID'];
    $userid = $_SESSION['userID'];

	$query = "UPDATE Document SET displayName = '$docName', dateCreated = '$docDate' WHERE documentID = $id AND userID = $userid";
	$updateBelongsToQuery = "UPDATE belongs_to SET courseID = '$courseid' WHERE documentID = $id AND userID = $userid";
	$result = mysqli_query($conn,$query) or die('Error, query failed');
	$result2 = mysqli_query($conn,$updateBelongsToQuery) or die('Error, query failed');
}
header("Location: ../views/docview.php");
mysqli_close($conn);
exit;

?>