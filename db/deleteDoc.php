<?php
	include_once 'db_settings.php';

    $id = 89; //should be stored within url and accessed via "_GET"
    $userid = 25; //should be stored within a session var somewhere
    $query = "DELETE FROM Document WHERE documentID = $id AND userID = $userid";
    $result = mysqli_query($conn,$query) or die('Error, query failed');
    header("Location: ../views/docsearch.php");
    mysqli_close($conn);
    exit;
?>