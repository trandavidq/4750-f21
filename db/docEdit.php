<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_settings.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $subjectName = $_POST['subjectName'];
	$courseName = $_POST['courseName'];
	$docName = $_POST['docName'];
	$docDate = $_POST['docDate'];
    
	$id = 1; //should be stored within url and accessed via "_GET"
    $userid = 25; //should be stored within a session var somewhere

	$query = "UPDATE Document SET displayName = '$docName' WHERE documentID = $id AND userID = $userid";
	$result = mysqli_query($conn,$query) or die('Error, query failed');
}
header("Location: ../views/docview.php");
mysqli_close($conn);
exit;

?>