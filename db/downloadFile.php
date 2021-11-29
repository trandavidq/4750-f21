<?php
//NOTE: This only works on my version of the database, you will need to insert the appropriate entries into
//the file table to get this working
	include_once 'db_settings.php';
    session_start();

    $userid = $_SESSION['userID'];
    $docID = $_POST["documentID"];
    $fileName_query = $conn->prepare("SELECT fileName FROM Document WHERE userID = ? AND documentID = ?");
    $fileName_query->bind_param("ii", $userid, $docID);
    $fileName_query->execute();
    $fileNameRes = $fileName_query->get_result();
    list($fName) = mysqli_fetch_array($fileNameRes);
    $query = $conn->prepare("SELECT * FROM File WHERE fileName = ?");
    $query->bind_param("s",$fName);
    $query->execute();
    $result = $query->get_result();
    list($fileName, $fileType, $fileContents) = mysqli_fetch_array($result);
    header("Content-type: $fileType");
    header("Content-Disposition: attachment; filename=$fileName");
    ob_clean();
    flush();
    echo $fileContents;
    mysqli_close($conn);
    exit;

?>