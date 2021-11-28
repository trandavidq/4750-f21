<?php
	include_once 'db_settings.php';
    session_start();

    $id = $_POST["documentID"];
    $userid = $_SESSION['userID'];
    echo $id;
    echo $userid;
    $query2 = "DELETE FROM belongs_to WHERE documentID = $id AND userID = $userid";
    $result2 = mysqli_query($conn,$query2) or die('Error, belongs query failed');
    $query = "DELETE FROM Document WHERE documentID = $id AND userID = $userid";
    $result = mysqli_query($conn,$query) or die('Error, doc query failed');
    header("Location: ../views/docsearch.php");
    mysqli_close($conn);
    exit;
?>