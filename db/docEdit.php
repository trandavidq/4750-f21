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

	$query = $conn->prepare("UPDATE Document SET displayName = ?, dateCreated = ? WHERE documentID = ? AND userID = ?");
	$query->bind_param("ssii", $docName, $docDate, $id, $userid);
	$query->execute();
	$updateBelongsToQuery = $conn->prepare("UPDATE belongs_to SET courseID = ? WHERE documentID = ? AND userID = ?");
	$updateBelongsToQuery->bind_param("sii", $courseid, $id, $userid);
	$updateBelongsToQuery->execute();
}
header("Location: ../views/docview.php");
mysqli_close($conn);
exit;

?>