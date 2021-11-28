<?php
//NOTE: This only works on my version of the database, you will need to insert the appropriate entries into
//the file table to get this working
	include_once 'db_settings.php';
    session_start();

    $userid = $_SESSION['userID'];
    $docID = $_POST["documentID"];
    $fileName_query = "SELECT fileName FROM Document WHERE userID = $userid AND documentID = $docID";
    $fileNameRes = mysqli_query($conn, $fileName_query);
    list($fName) = mysqli_fetch_array($fileNameRes);
    $query = "SELECT * " .
            "FROM File WHERE fileName = '$fName'";
    $result = mysqli_query($conn,$query) or die('Error, query failed');
    list($fileName, $fileType, $fileContents) = mysqli_fetch_array($result);
    header("Content-type: $fileType");
    header("Content-Disposition: attachment; filename=$fileName");
    ob_clean();
    flush();
    echo $fileContents;
    mysqli_close($conn);
    exit;

?>